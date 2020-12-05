<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$tag        = Tag::factory(20)->create();
        //$category   = Category::factory(10)->create();
        //$post       = Post::factory(20)->create();
        //$comment    = Comment::factory(20)->create();
        $user       = User::factory(2)->create();
        //$event      = Event::factory(20)->create();
        $role           = Role::factory(2)->create();

        //$post->each(function ($post){
        //    $post->tag()->attach(['post_id' => $post->post_id], ['tag_id' => 10]);
        //    $post->comment()->attach(['post_id' => $post->post_id], ['comment_id' => 8]);
        //});


    }
}
