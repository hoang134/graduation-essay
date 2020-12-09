<?php

namespace App\Http\Controllers;

use App\Post;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProtectPostController extends Controller
{

    protected $activeMenu = 'protect-menu';
    public function index()
    {
        $posts = Post::all();

        return view('admin.protect-post.index',[
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
                    <td> {$user->name}</td>";
                echo "<td style='color: #005cbf'><a class='data-id' id='{$userPost->first()->id}' data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\">{$userPost->first()->note_2}</a></td>";
                echo "<td><a href='/admin/messenger/assessor/{$user->id}'> Nhắn tin</a></td>";
            if ($userPost->first()->status == UserPost::STATUS_ELIMINATED )
                echo"<td> Chưa đạt</td>";

            if ($userPost->first()->status == UserPost::STATUS_REQUEST )
            echo"<td> đề xuất</td>";

            if ($userPost->first()->status == UserPost::STATUS_QUALIFIED )
                echo"<td> <button  data-id = '{$user->id}' class='verify btn-danger' value = 'Đạt yêu cầut' >Đạt yêu cầu</button>
                <input type='checkbox' value='{$user->id}' name='list[]'>
                </td>";

            if ($userPost->first()->status == UserPost::STATUS_FINISH )
                echo"<td><button data-id = '{$user->id}' class='verify btn-success' value = 'Đạt yêu cầu' > Hoàn thành</button>
                </td>";
            echo "</tr>";

        }

    }

    public function evaluate(Request $request)
    {
        if ($request->id == null)
        {
            $list = $request->input('list');
            DB::table('user_posts')->whereIn('user_id',$list)->update(['status'=> UserPost::STATUS_FINISH]);

        }
        else
        {
            $userPost = UserPost::where('user_id','=',$request->id)->first();

            if ($userPost->status == UserPost::STATUS_QUALIFIED  )
            {
                $userPost = UserPost::find($userPost->id);
                $userPost->status = UserPost::STATUS_FINISH;
                $userPost->save();
            }

            else if ($userPost->status == UserPost::STATUS_FINISH)
            {
                $userPost->status = UserPost::STATUS_QUALIFIED;
                $userPost->save();

            }
        }
    }

    public function note(Request $request)
    {
        $userPost = UserPost::find($request->id);
        $userPost->note_2 = $request->note;
        $userPost->save();
    }

}
