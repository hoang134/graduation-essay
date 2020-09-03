<?php

namespace App\Http\Controllers;

use App\Post;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class PostController extends Controller
{   protected  $activeMenu  ="post-menu";
    public function index()
    {
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

        return view('admin.post.add-edit',[
            'post'=>$post,
            'activeMenu'=>$this->activeMenu
        ]);

    }

    public function delete(Request $request){
        $post = Post::find($request->id);
        $post->delete();
        return redirect(route('post'))->with('success', "Xóa thành công!");;

    }

    public function save(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        if(!isset($request->id))
        {
            $post  = new Post();
            $post->title = $request->title;
            $post->content = $request->contents;
            $post->save();

            $userPost = new UserPost();
            $userPost->user_id = Auth::user()->id;
            $userPost->post_id = $post->id;
            $userPost->type =UserPost::TYPE_POST;
            $userPost->save();

            return redirect()->route('post')->with('success', 'Tạo đề tài thành công!');;
        }
        else
        {


            $post = Post::find($request->id);
            $post->title = $request->title;
            $post->content = $request->contents;
            $post->save();
           return redirect()->route('post')->with('success', 'Lưu thành công!');;
        }
    }
}
