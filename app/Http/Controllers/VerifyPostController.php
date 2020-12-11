<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifyPostController extends Controller
{
    protected $activeMenu = 'verify-menu';

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $posts = $user->posts;

        return view('admin.verify.index',[
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
            $userPost = UserPost::where('user_id','=',$user->id)->first();

            if ($userPost->status_register == UserPost::STATUS_REGISTER_FINISH){
                echo
                "<tr>
                    <td> {$user->id}</td>
                    <td> {$post->title}</td>
                    <td> {$post->lecturer->first()->name}</td>
                    <td> {$user->name}</td>";
                echo "<td style='color: #005cbf'><a class='data-id' id='{$userPost->id}' data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\">{$userPost->note}</a></td>";
                echo "<td><a href='/admin/messenger/lecturer/{$user->id}'>nhắn tin</a></td>";
                if ($userPost->status == UserPost::STATUS_ELIMINATED )
                    echo"<td> <button data-id = '{$user->id}' class='verify btn-danger' value = 'Chưa đạt' > Chưa đạt</button></td>";
                if ($userPost->status == UserPost::STATUS_REQUEST )
                    echo"<td> <button  data-id = '{$user->id}' class='verify btn-success' value = 'Đề xuất' >đề xuất</button></td>";
                if ($userPost->status == UserPost::STATUS_QUALIFIED )
                    echo"<td> <span>Đạt yêu cầu</span></td>";
                if ($userPost->status == UserPost::STATUS_FINISH )
                    echo"<td> <span>Hoàn thành</span></td>";
                echo "</tr>";
            }

        }
    }

    public function note(Request $request)
    {
        $userPost = UserPost::find($request->id);
        $userPost->note = $request->note;
        $userPost->save();
    }

    public function evaluate(Request $request)
    {
        $userPost = UserPost::where('user_id','=',$request->id)->first();

        if ($userPost->status == UserPost::STATUS_ELIMINATED || $userPost->status == null )
        {
            $userPost = UserPost::find($userPost->id);
            $userPost->status = UserPost::STATUS_REQUEST;
            $userPost->save();
        }

        else if ($userPost->status == UserPost::STATUS_REQUEST)
        {
            $userPost->status = UserPost::STATUS_ELIMINATED;
            $userPost->save();

        }
    }
}
