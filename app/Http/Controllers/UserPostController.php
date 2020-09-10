<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{   protected $activeMenu = 'list-post-menu';
    public function index()
    {
        $this->authorize('viewAny',UserPost::class);
        $userPosts = UserPost::all();
        return view('admin.list-post.index',[
            'activeMenu'=>$this->activeMenu,
            'userPosts'=>$userPosts
        ]);
    }

    public function delete(Request $request)
    {
        $this->authorize('viewAny',UserPost::class);
        $userPost = UserPost::find($request->id);
        $userPost->delete();
        return redirect()->route('list',[
            'activeMenu'=>$this->activeMenu,
        ])->with('success','Xóa thành công');
    }

}
