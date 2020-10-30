<?php

use Illuminate\Database\Seeder;
use App\UserPost;

class UserPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $userPost = new UserPost();
         $userPost->id = 1;
         $userPost->user_id = 2;
         $userPost->post_id = 1;
         $userPost->type = UserPost::TYPE_POST;
         $userPost->save();

        $userPost = new UserPost();
        $userPost->id = 2;
        $userPost->user_id = 2;
        $userPost->post_id = 2;
        $userPost->type = UserPost::TYPE_POST;
        $userPost->save();

        $userPost = new UserPost();
        $userPost->id = 3;
        $userPost->user_id = 3;
        $userPost->post_id = 3;
        $userPost->type = UserPost::TYPE_POST;
        $userPost->save();

        $userPost = new UserPost();
        $userPost->id = 4;
        $userPost->user_id = 4;
        $userPost->post_id = 4;
        $userPost->type = UserPost::TYPE_POST;
        $userPost->save();

        $userPost = new UserPost();
        $userPost->id = 5;
        $userPost->user_id = 5;
        $userPost->post_id = 1;
        $userPost->status = UserPost::STATUS_ELIMINATED;
        $userPost->type = UserPost::TYPE_REGISTER;
        $userPost->save();

        $userPost = new UserPost();
        $userPost->id = 6;
        $userPost->user_id = 6;
        $userPost->post_id = 2;
        $userPost->status = UserPost::STATUS_ELIMINATED;
        $userPost->type = UserPost::TYPE_REGISTER;
        $userPost->save();

        $userPost = new UserPost();
        $userPost->id = 7;
        $userPost->user_id = 7;
        $userPost->post_id = 3;
        $userPost->status = UserPost::STATUS_ELIMINATED;
        $userPost->type = UserPost::TYPE_REGISTER;
        $userPost->save();
    }
}
