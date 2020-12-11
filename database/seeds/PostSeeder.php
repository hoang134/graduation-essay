<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $post = new Post();
       $post->title = "đề tài 1";
       $post->content = "thực tập chuyên ngành 1";
        $post->quantity = 2;
       $post->save();

        $post = new Post();
        $post->title = "đề tài 2";
        $post->content = "thực tập chuyên ngành 2";
        $post->quantity = 2;
        $post->save();
        $post = new Post();

        $post->title = "đề tài 3";
        $post->content = "thực tập chuyên ngành 3";
        $post->quantity = 2;
        $post->save();

        $post = new Post();
        $post->title = "đề tài 4";
        $post->content = "thực tập chuyên ngành 4";
        $post->quantity = 4;
        $post->save();
    }
}
