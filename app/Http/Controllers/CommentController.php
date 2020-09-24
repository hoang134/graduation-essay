<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function comment( Request $request)
    {
        $comments = Report::find($request->id)->comments;

        foreach ($comments as $comment){
            echo"<p><lable style='color: #0056b3'>{$comment->user->name}</lable><br> $comment->content </p>";
        }

    }

    public function create(Request $request)
    {


        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->report_id = $request->report_id;
        $comment->content = $request->contents;
        $comment->save();
    }

    public function commentStudent(Request $request)
    {
       $report =  DB::table('reports')->where('user_id',Auth::user()->id)
           ->where('topic_report_id',$request->topic_id)->get();
        $comments=Report::find($report->first()->id)->comments;

        foreach ($comments as $comment){
            echo"<p><lable style='color: #0056b3'>{$comment->user->name}</lable><br> $comment->content </p>";
        }
    }

    public function createCommentStudent(Request $request)
    {
        $report =  DB::table('reports')->where('user_id',Auth::user()->id)
            ->where('topic_report_id',$request->topic_id)->get();

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->report_id =$report->first()->id;
        $comment->content = $request->contents;
        $comment->save();
    }
}
