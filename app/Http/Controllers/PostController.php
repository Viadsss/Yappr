<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Storage;

class PostController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user:id,full_name,username,avatar'])->withCount('reactions')->latest()->simplePaginate(5);

        return view('yaps.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('yaps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'content' => ['required', 'string', 'min:10', 'max:2000'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
            'visibility' => ['required', 'in:public,private,followers'],
            'scheduled_at' => ['nullable', 'date'],
        ], [
            'thumbnail.max' => 'The thumbnail must be 5MB or smaller.',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['user_id'] = auth()->user()->id;

        Post::create($validated);

        return redirect()->route('index')
            ->with('status', 'Post created successfully!')
            ->with('status_type', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user')->loadCount('reactions');
        $reacted = false;

        $user = auth()->user();

        $reacted = $post->hasReactionFrom($user);

        // if (auth()->check()) {
        //     $reacted = $post->reactions()->where('user_id', auth()->id())->exists();
        // }

        return view('yaps.show', ['post' => $post, 'reacted' => $reacted]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('yaps.edit', compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'content' => ['required', 'string', 'min:10', 'max:2000'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
            'visibility' => ['required', 'in:public,private,followers'],
            'scheduled_at' => ['nullable', 'date'],
            'remove_thumbnail' => ['nullable', 'boolean'],
        ], [
            'thumbnail.max' => 'The thumbnail must be 5MB or smaller.',
        ]);

        if ($request->boolean('remove_thumbnail') && $post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
            $validated['thumbnail'] = null;
        }

        // Handle new thumbnail upload
        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        unset($validated['remove_thumbnail']);

        $post->update($validated);

        return redirect()
            ->route('post.show', $post->slug)
            ->with('status', 'Post updated successfully!')
            ->with('status_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();


        $redirectUrl = request('redirect_to')
            ?? route('profile', auth()->user());

        return redirect($redirectUrl)
            ->with('status', 'Post deleted successfully!')
            ->with('status_type', 'success');
    }
}
