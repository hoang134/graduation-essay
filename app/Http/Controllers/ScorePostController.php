<?php

namespace App\Http\Controllers;

use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScorePostController extends Controller
{

    protected $activeMenu = 'score-menu';
    public function index()
    {
        $userPosts = DB::table('user_posts')->where('status','=',UserPost::STATUS_FINISH)->get();
        //dd($userPosts);
        return view('admin.score-post.index',[
            'userPosts'=>$userPosts,
            "activeMenu"=>$this->activeMenu
        ]);
    }

    public function save(Request $request)
    {
        $scores = $request->scores;
        $idUserPosts = $request->idUserPost;

        for($i = 0; $i<sizeof($scores);$i++)
        {
            DB::table('user_posts')->where('id',$idUserPosts[$i])->update(['scores'=>$scores[$i]]);
        }

       return redirect()->route('score.post')->with('success','Lưu thành công');
    }
}
