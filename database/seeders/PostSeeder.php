<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $posts = Post::factory()->times(100)->create();
        foreach ($posts as $post) {
            $at = new PostTag;
            $at->post_id = $post->id;
            $at->tag_id = rand(1, 30);
            $at->save();
        }

    }
}