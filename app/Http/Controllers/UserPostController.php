<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index()
    {

        $userPosts = UserPost::all();
        return view('admin.list-post.index',compact('userPosts'));
    }
}
