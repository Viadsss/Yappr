<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class StorageSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:seed
                            {--target=public : Target storage directory (public or private)}
                            {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed storage directories with initial files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Prompt for source directory
        $sourcePath = $this->ask('Enter the source directory path (relative to project root)', 'resources/fileseeds');
        $sourcePath = base_path($sourcePath);

        $targetType = $this->option('target');
        $force = $this->option('force');

        // Validate target type
        if (! in_array($targetType, ['public', 'private'])) {
            $this->error("Invalid target type. Must be 'public' or 'private'.");

            return 1;
        }

        if (! is_dir($sourcePath)) {
            $this->error("Source directory does not exist: {$sourcePath}");

            return 1;
        }

        // Set target base path
        $targetBasePath = storage_path("app/{$targetType}");

        // Ensure the storage directory exists
        if (! File::exists($targetBasePath)) {
            File::makeDirectory($targetBasePath, 0755, true);
            $this->info("Created directory: {$targetBasePath}");
        }

        // Get all subdirectories in the source path
        $directories = File::directories($sourcePath);

        // If there are no subdirectories, check if there are files in the root
        $totalCopied = 0;

        if (empty($directories)) {
            // Check if there are files in the source directory itself
            $filesInRoot = File::files($sourcePath);

            if (empty($filesInRoot)) {
                $this->warn("No files or subdirectories found in {$sourcePath}. Nothing to seed.");

                return 0;
            }

            // Copy files from the root directory
            $copiedCount = $this->copyFiles($filesInRoot, $targetBasePath, $force);
            $totalCopied += $copiedCount;
            $this->info("Seeded {$copiedCount} files to storage/app/{$targetType}");
        } else {
            // Process each subdirectory
            foreach ($directories as $directory) {
                $dirName = basename($directory);
                $targetDir = "{$targetBasePath}/{$dirName}";

                // Create target directory if it doesn't exist
                if (! File::exists($targetDir)) {
                    File::makeDirectory($targetDir, 0755, true);
                    $this->info("Created directory: {$targetDir}");
                }

                // Copy all files from source to target
                $filesInDir = File::files($directory);
                $copiedCount = $this->copyFiles($filesInDir, $targetDir, $force);
                $totalCopied += $copiedCount;

                $this->info("Seeded {$copiedCount} files to storage/app/{$targetType}/{$dirName}");
            }
        }

        $this->info("Storage seeding complete! {$totalCopied} files copied.");

        return 0;
    }

    /**
     * Copy files from source to target directory
     *
     * @param  array  $files  Array of SplFileInfo objects
     * @param  string  $targetDir  Target directory path
     * @param  bool  $force  Whether to force overwrite existing files
     * @return int Number of files copied
     */
    protected function copyFiles(array $files, string $targetDir, bool $force): int
    {
        $copiedCount = 0;

        foreach ($files as $file) {
            $fileName = $file->getFilename();
            $targetFile = "{$targetDir}/{$fileName}";

            // Check if file already exists and handle accordingly
            if (File::exists($targetFile) && ! $force) {
                $this->line("  <comment>Skipped</comment>: {$fileName} (already exists)");

                continue;
            }

            try {
                File::copy($file->getPathname(), $targetFile);
                $copiedCount++;
                $this->line("  <info>Copied</info>: {$fileName}");
            } catch (\Exception $e) {
                $this->error("  Failed to copy {$fileName}: {$e->getMessage()}");
            }
        }

        return $copiedCount;
    }
}
