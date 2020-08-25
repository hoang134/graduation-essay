<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->id = 1;
        $comment->user_id = 1;
        $comment->report_id = 1;
        $comment->content = "comment 1";
        $comment->save();
    }
}
