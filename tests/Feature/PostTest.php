<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_belongs_to_user()
    {
        // Create a user and a post
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        // Assert that the post has the correct user relationship
        $this->assertEquals($user->id, $post->user->id);
        $this->assertInstanceOf(User::class, $post->user);
    }

    public function test_post_has_many_reactions()
    {
        // Create a post and associate reactions with it
        $post = Post::factory()->create();
        $reactions = Reaction::factory()->count(3)->create(['post_id' => $post->id]);

        // Assert that the post has 3 reactions
        $this->assertCount(3, $post->reactions);
        $this->assertInstanceOf(Reaction::class, $post->reactions->first());
    }

    public function test_a_post_can_be_created()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('posts', [
            'title' => $post->title,
            'user_id' => $user->id,
        ]);
    }

    public function test_slug_is_generated_correctly()
    {
        $firstPost = Post::factory()->create();

        $this->assertEquals($firstPost->slug, Str::slug($firstPost->title));
    }

    public function test_slug_is_unique_when_titles_are_identical()
    {
        $firstPost = Post::factory()->create();
        $secondPost = Post::factory()->create(['title' => $firstPost->title]);
        $thirdPost = Post::factory()->create(['title' => $firstPost->title]);

        $this->assertEquals($firstPost->slug, Str::slug($firstPost->title));
        $this->assertEquals($secondPost->slug, Str::slug($firstPost->title) . '-1');
        $this->assertEquals($thirdPost->slug, Str::slug($firstPost->title) . '-2');
    }
}
