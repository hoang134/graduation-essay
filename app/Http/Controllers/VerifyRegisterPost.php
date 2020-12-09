<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyRegisterPost extends Controller
{
    protected $activeMenu = 'verify-register-menu';

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $posts = $user->posts;

        return view('admin.verify-register-post.index',[
            'activeMenu' => $this->activeMenu,
            'posts'=>$posts
        ]);
    }

    public function list(Request $request)
    {
        $post = Post::find($request->id);
        $users = $post->students;


        foreach ($users as $user)
        {
            echo
            "<tr>
                    <td> {$user->id}</td>
                    <td> {$post->title}</td>
                    <td> {$post->lecturer->first()->name}</td>
                    <td> <a href='/admin/post/verify/register/infoStudent/{$user->id}'>{$user->name}</a></td>";
            $userPost = UserPost::where('user_id','=',$user->id)->first();

            if ($userPost->status_register == UserPost::STATUS_REGISTER_FINISH )
                echo"<td> <button data-id = '{$user->id}' class='verify btn-success' value = 'Hoàn thành đăng ký' > Đồng ý</button></td>";
            else
                echo"<td> <button  data-id = '{$user->id}' class='verify btn-danger' value = 'Đề xuất' >đề xuất</button></td>";
            echo "</tr>";
        }
    }

    public function evaluate(Request $request)
    {

        $userPost = UserPost::where('user_id','=',$request->id)->first();

        if ($userPost->status_register == UserPost::STATUS_REGISTER_REQUEST || $userPost->status_register == UserPost::STATUS_REGISTER_ELIMINATED )
        {
            $userPost = UserPost::find($userPost->id);
            $userPost->status_register = UserPost::STATUS_REGISTER_FINISH;
            $userPost->save();
        }

        else
        {
            $userPost->status_register = UserPost::STATUS_REGISTER_ELIMINATED;
            $userPost->save();

        }
    }

    public function infoStudent( Request $request)
    {
        $user = User::find($request->id);
        return view('admin.verify-register-post.inforStudent',[
            'activeMenu' => $this->activeMenu,
            'user'=>$user
        ]);
    }

}
