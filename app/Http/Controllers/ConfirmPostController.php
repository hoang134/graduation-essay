<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmPostController extends Controller
{
    protected $activeMenu = 'confirm-menu';

    public function index()
    {
        $posts = Post::all();

        return view('admin.confirm.index',[
            'activeMenu' => $this->activeMenu,
            'posts'=>$posts
        ]);

    }

    public function list(Request $request)
    {

        $post = Post::find($request->id);
        $users = $post->students;

        //return UserPost::find(6)->status;

        foreach ($users as $user)
        {

            $userPost = DB::table('user_posts')->where('user_id',"$user->id");

            echo "<tr>
                    <td> {$user->id}</td>
                    <td> {$post->title}</td>
                    <td> {$post->lecturer->first()->name}</td>
                    <td> {$user->name}</td>
                    <td> <a href='/admin/confirm/detail/$user->id'>Chi tiết</a></td>
                    <td> {$userPost->first()->note}</td>";

            if ($userPost->first()->status == UserPost::STATUS_ELIMINATED )
                echo"<td style='color: red'> Chưa đạt</td>";
            if ($userPost->first()->status == UserPost::STATUS_FINISH )
                echo"<td style='color: #28a745'> Hoàn thành</td>";

            if ($userPost->first()->status == UserPost::STATUS_REQUEST )
                echo"<td> <button  data-id = '{$user->id}' class='verify btn-danger' value = 'Đề xuất' >đề xuất</button>
                <input type='checkbox' value='{$user->id}' name='list[]'>
                </td>";

            if ($userPost->first()->status == UserPost::STATUS_QUALIFIED )

                echo"<td><button data-id = '{$user->id}' class='verify btn-success' value = 'Đạt yêu cầu' > Đạt yêu cầu</button>
                </td>";
            echo "</tr>";

        }

    }

    public function evaluate(Request $request)
    {
        if ($request->id == null)
        {
            $list = $request->input('list');
            DB::table('user_posts')->whereIn('user_id',$list)->update(['status'=> UserPost::STATUS_QUALIFIED]);

        }
        else
        {
            $userPost = UserPost::where('user_id','=',$request->id)->first();

            if ($userPost->status == UserPost::STATUS_REQUEST  )
            {
                $userPost = UserPost::find($userPost->id);
                $userPost->status = UserPost::STATUS_QUALIFIED;
                $userPost->save();
            }

            else if ($userPost->status == UserPost::STATUS_QUALIFIED)
            {
                $userPost->status = UserPost::STATUS_REQUEST;
                $userPost->save();

            }
        }
    }

    public function detail(Request $request)
    {
        $reports = User::find($request->id)->reports;

        return view('admin.confirm.detail-report',[
            'reports'=>$reports
        ]);
    }
}
