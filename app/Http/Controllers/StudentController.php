<?php

namespace App\Http\Controllers;

use App\Post;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class StudentController extends Controller
{
    public function informationStudent()
    {

        return view('student.information');
    }

    public function register(Request $request,$id)
    {
        $userpost = New UserPost();
        $userpost->user_id = Auth::user()->id;
        $userpost->post_id = $request->id;
        $userpost->save();
        return redirect()->route('home');
    }
}
