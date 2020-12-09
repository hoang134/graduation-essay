<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class PostController extends Controller
{   protected  $activeMenu  ="post-menu";
    public function index()
    {
        $this->authorize('viewany',User::class);
        $posts = Post::all();
        return view('admin.post.index', [
            'posts'=>$posts,
            'activeMenu'=>$this->activeMenu
        ]);
    }

    public function create()
    {
        return view('admin.post.add-edit',[
            'activeMenu'=>$this->activeMenu
        ]);
    }

    public function edit(Request $request){
        $post = Post::find($request->id);
        $this->authorize('update',$post);
        return view('admin.post.add-edit',[
            'post'=>$post,
            'activeMenu'=>$this->activeMenu
        ]);

    }

    public function deadline()
    {
        $this->activeMenu = "deadline-menu";
        $posts = Post::all();
        return view('admin.post.deadline', [
            'posts'=>$posts,
            'activeMenu'=>$this->activeMenu
        ]);

    }

    public function saveDeadline( Request $request)
    {
        if (isset($request->id))
        {
            $post = Post::find($request->id);
            $post->deadline = $request->date;
            $post->save();
        }
        else
        {
            DB::table('posts')->update(array('deadline' => "$request->date"));
        }
    }

    public function delete(Request $request){

    $post = Post::find($request->id);
    UserPost::where('post_id',$request->id)->delete();
    $this->authorize('delete',$post);
    $post->delete();

    return redirect()->route('post')->with('success', "Xóa thành công!");

}

    public function save(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'contents'=>'required',
            'quantity'=>'required'
        ]);

        if(!isset($request->id))
        {
            $post  = new Post();
            $post->title = $request->title;
            $post->content = $request->contents;
            $post->quantity = $request->quantity;
            $post->save();

            $userPost = new UserPost();
            $userPost->user_id = Auth::user()->id;
            $userPost->post_id = $post->id;
            $userPost->type = UserPost::TYPE_POST;

            $userPost->status = UserPost::STATUS_ELIMINATED;

            $userPost->save();

            return redirect()->route('post')->with('success', 'Tạo đề tài thành công!');
        }
        else
        {


            $post = Post::find($request->id);
            $post->title = $request->title;
            $post->content = $request->contents;
            $post->quantity = $request->quantity;
            $post->save();
           return redirect()->route('post')->with('success', 'Lưu thành công!');;
        }
    }
}
