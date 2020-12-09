<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Report;
use App\TopicReport;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TopicReportController extends Controller
{
    protected $activeMenu = 'topicReport-menu';

    public function index()
    {
        $topicReport =TopicReport::all();
       //dd($topicReport);

        $user = User::find(Auth::user()->id);
        $postIds = $user->posts->pluck('id');
        $topicReports = DB::table('topic_reports')->whereIn('post_id',$postIds)->get();

        return view('admin.report.index', [
            'activeMenu' => $this->activeMenu,
            'topicReports'=> $topicReports
        ]);
    }

    public function create()
    {

        $user = User::find(Auth::user()->id);
        $posts = $user->posts;
        return view('admin.report.add-edit',[
            'activeMenu' => $this->activeMenu,
            'posts'=>$posts
        ]);
    }

    public function edit(Request $request)
    {
        $topicReport = TopicReport::find($request->id);
        return view('admin.report.add-edit',[
            'activeMenu' => $this->activeMenu,
            'topicReport' => $topicReport
        ]);
    }

    public function delete( Request $request)
    {

    }

    public function detailReport(Request $request)
    {
        $reports = TopicReport::find($request->id)->reports;


        return view('admin.report.detail-report',[
            'reports'=>$reports
            ]);
    }



    public function download(Request $request)
    {
        $report = Report::find($request->id);
        $nameFile =$report->title.' '. $report->user->name.'_'.$report->user->code.'.docx';

        return Storage::download($report->path,$nameFile);
    }

    public function save(Request $request)
    {

        if(!isset($request->id)){
            $request->validate([
                    'title'=>'required',
                    'deadline'=>'required',
                ]
            );
            $topicReport = new TopicReport();
            $topicReport->post_id = $request->post_id;
            $topicReport->title = $request->title;
            $topicReport->deadline = $request->deadline;
            $topicReport->save();
            return redirect()->route('topic.report')->with('success','thêm thành công');
        }
        else{
            $request->validate([
                    'title'=>'required',
                ]
            );
            $topicReport = TopicReport::find($request->id);
            $topicReport->title = $request->title;
            ($request->deadline !=null ) ? $topicReport->deadline = $request->deadline : '';
            $topicReport->save();
            return redirect()->route('topic.report')->with('success','Sửa thành công');
        }
    }
}
