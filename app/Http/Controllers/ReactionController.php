<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Number;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        $user = auth()->user();
        $post = Post::findOrFail($validated['post_id']);

        // Toggle reaction
        $existingReaction = Reaction::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingReaction) {
            // Remove reaction
            $existingReaction->delete();
            $isReacted = false;
        } else {
            // Add reaction
            Reaction::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
            $isReacted = true;
        }

        // Recalculate the reaction count AFTER the update
        $reactionsCount = Reaction::where('post_id', $post->id)->count();

        return response()->json([
            'success' => true,
            'reactions_count' => Number::abbreviate($reactionsCount), // Ensure this is formatted correctly
            'is_reacted' => $isReacted,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
}
