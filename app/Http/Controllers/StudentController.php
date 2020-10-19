<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class StudentController extends Controller
{

    public function viewpost()
    {
        $posts = Post::all();
        return view('student.post.viewpost', [
            'posts'=>$posts
        ]);
    }

    public function informationStudent()
    {
        $user = Auth::user();
        return view('student.user.information',[
           'user'=>$user
        ]);
    }

    public function register(Request $request)
    {

        $isUser = DB::table('user_posts')->where('user_id',"$request->user_id")->get();
        if(!$isUser->isEmpty())
            return 0;
        $userpost = New UserPost();
        $userpost->user_id =$request->user_id;
        $userpost->post_id = $request->post_id;
        $userpost->save();
        return redirect()->route('home');
    }

    public function post()
    {
        $user = Auth::user();
        $isUser = DB::table('user_posts')->where('user_id',"$user->id")->get();
        if(!$isUser->isEmpty()){
            return view('student.post.index',[
                'user'=>$user
            ]);
        }
        else
            return view('student.post.index');

    }

    public function deletePost()
    {
        DB::table('user_posts')->where('user_id',Auth::user()->id)->delete();
        return redirect()->route('student.post');
    }

    public function edit()
    {
        $user = Auth::user();

        return view('student.user.edit',[
            'user'=>$user
        ]);
    }

    public function save(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
            'code'=> 'required',
            'password_confirmation' => 'same:password'
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->code = $request->code;
        $user->class = $request->class;
        if (!$request->password == '')
            $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('student.information');
    }

}
