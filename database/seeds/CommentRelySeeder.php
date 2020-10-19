<?php

use Illuminate\Database\Seeder;
use App\CommentReply;

class CommentRelySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentRely = new CommentReply();
        $commentRely->id = 1;
        $commentRely->comment_id = 1;
        $commentRely->content = "comment reply 1";
        $commentRely->save();
    }
}
