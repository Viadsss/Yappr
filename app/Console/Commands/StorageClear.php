<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StorageClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear existing public or private storage files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $choice = $this->choice(
            'Which storage would you like to clear?',
            ['public', 'private'],
            0
        );

        if ($choice === 'public') {
            $publicPath = storage_path('app/public');
            $publicSymlinkPath = public_path('storage');

            if (!is_dir($publicPath)) {
                $this->warn("Public storage directory doesn't exist: $publicPath");
            } else {
                $this->info('Clearing public storage directory...');
                $count = $this->clearDirectory($publicPath);
                $this->info("Cleared {$count} files from public storage (preserved .gitignore files).");
            }

            if (!is_dir($publicSymlinkPath)) {
                $this->warn("Public symlink directory doesn't exist: $publicSymlinkPath");
            } else {
                $count = $this->clearDirectory($publicSymlinkPath);
                $this->info("Cleared {$count} files from public symlink (preserved .gitignore files).");
            }
        } else {
            $privatePath = storage_path('app/private');

            if (!is_dir($privatePath)) {
                $this->warn("Private storage directory doesn't exist: $privatePath");
                return;
            }

            $this->info('Clearing private storage directory...');
            $count = $this->clearDirectory($privatePath);
            $this->info("Cleared {$count} files from private storage (preserved .gitignore files).");
        }

        $this->info('Storage clearing complete.');
    }

    /**
     * Recursively deletes files and folders, excluding `.gitignore`
     *
     * @param string $path Directory path to clear
     * @return int Number of files removed
     */
    protected function clearDirectory(string $path): int
    {
        if (!is_dir($path)) {
            $this->warn("Directory does not exist: $path");
            return 0;
        }

        $count = 0;
        $files = scandir($path);

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $fullPath = $path . DIRECTORY_SEPARATOR . $file;

            try {
                if (is_dir($fullPath)) {
                    // If it's a directory, recursively clear it
                    $count += $this->clearDirectory($fullPath);

                    // Check if directory is empty (except for .gitignore)
                    $remainingFiles = array_diff(scandir($fullPath), ['.', '..', '.gitignore']);

                    // If directory only contains .gitignore or is completely empty, keep it
                    // Otherwise remove the directory
                    if (count($remainingFiles) === 0 || (count($remainingFiles) === 1 && in_array('.gitignore', $remainingFiles))) {
                        // Keep the directory with .gitignore
                    } else {
                        rmdir($fullPath);
                        $count++;
                    }
                } elseif ($file !== '.gitignore') {
                    // If it's a file (not .gitignore), delete it
                    if (unlink($fullPath)) {
                        $count++;
                    }
                }
            } catch (\Exception $e) {
                $this->error("Failed to remove {$fullPath}: " . $e->getMessage());
            }
        }

        return $count;
    }
}
