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
        $quantityUserPosts =array();

        $date = date('Y-m-d');
        $posts = Post::all();

        foreach ($posts as $post)
        {
            $quantityUserPost = DB::table('user_posts')->where('post_id',$post->id)
                ->where('status_register',UserPost::STATUS_REGISTER_REQUEST)
                ->count('status_register');

            array_push($quantityUserPosts,["$post->id"=>"$quantityUserPost"]);
        }

        return view('student.post.viewpost', [
            'posts'=>$posts,
            'date'=>$date,
            'quantityUserPosts'=>$quantityUserPosts
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
//        $quantityUserPost = DB::table('user_posts')->where('status_register',UserPost::STATUS_REGISTER_REQUEST)
//            ->where('post_id',$request->post_id)->count('*');
//        dd($quantityUserPost);
        $isUser = DB::table('user_posts')->where('user_id',"$request->user_id")->get();
        if(!$isUser->isEmpty()){
             return redirect()->route('student.post.viewpost')->with('error','Đăng ký thất bại');
        }

        $userpost = New UserPost();
        $userpost->user_id =$request->user_id;
        $userpost->post_id = $request->post_id;
        $userpost->status_register = UserPost::STATUS_REGISTER_REQUEST;
        $userpost->save();
        return redirect()->route('student.post')->with('success','Đăng ký thành công');
    }

    public function post()
    {
        $user = Auth::user();
        $date = date('Y-m-d');
        $isUser = DB::table('user_posts')->where('user_id',"$user->id")->get();

        $userPost = DB::table('user_posts')->where('user_id',$user->id)->get()->first();

        if(!$isUser->isEmpty()){
            return view('student.post.index',[
                'user'=>$user,
                'date'=>$date,
                'userPost'=>$userPost
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

    public function lecturer( Request $request)
    {
        $user = User::find($request->id);
        return view('student.post.lecturer',[
            'user'=>$user
        ]);
    }

}
