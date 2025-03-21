<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user:id,full_name,username,avatar')->latest()->simplePaginate(5);
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

        return redirect()->route('index')->with('status', 'Post created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
