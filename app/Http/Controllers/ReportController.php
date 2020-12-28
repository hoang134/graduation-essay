<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $post = Auth::user()->posts->first();

        if($post == null)
        {
            return session('empty','Chưa có đề bài báo cáo');
        }



        $isExpireds = ['id'=>'status'];

        $isReports = ['id' => 'status'];

        $topicReports = DB::table('topic_reports')->where('post_id', $post->id)->get();

        foreach ($topicReports as $topicReport) {
            $isReport = DB::table('reports')->where('topic_report_id', $topicReport->id)
                ->where('user_id',Auth::user()->id)->get();

            if($topicReport->deadline > date('Y-m-d'))
            {
                array_push($isExpireds, ["$topicReport->id" => 'false']);
            }
            else
            {
                array_push($isExpireds, ["$topicReport->id" => 'true']);
            }

            if ($isReport->isEmpty()) {
                array_push($isReports, ["$topicReport->id" => 'empty']);
            }
            else {
                array_push($isReports, ["$topicReport->id" => 'isset']);
            }
        }


        return view('student.report.index', [
            'topicReports' => $topicReports,
            'post' => $post,
            'isReports' => $isReports,
            'isExpireds' => $isExpireds
        ]);
    }

    public function create(Request $request)
    {
        return view('student.report.add-edit', [
            'topic_id' => $request->topic_id
        ]);
    }

    public function edit(Request $request)
    {
        $report = DB::table('reports')->where('user_id',Auth::user()->id)->where('topic_report_id',$request->topic_id)->get();
        $report = $report->first();
        return view('student.report.add-edit',[
            'report'=>$report
        ]);
    }

    public function save(Request $request)
    {
        if (!isset($request->id)){
            $request->validate([
                'file'=>'required',
                'title'=>'required',
                'contents'=>'required'
            ]);

            $reprot = new Report();
            $reprot->user_id = Auth::user()->id;
            $reprot->topic_report_id = $request->topicId;
            $reprot->title = $request->title;
            $reprot->content = $request->contents;
            $file=$request->file('file');
            $path = Storage::put('report', $file);
            $reprot->path = $path;
            $reprot->save();

            return redirect()->route('student.report.index');

        }

        else {
            $request->validate([
                'title'=>'required',
                'contents'=>'required'
            ]);
            $report = Report::find($request->id);
            $report->title = $request->title;
            $report->content = $request->contents;
            if(isset($request->file)){
                Storage::delete($report->path);
                $file = $request->file('file');
                $path = Storage::put('report', $file);
                $report->path = $path;
                $report->save();
            }


            return redirect()->route('student.report.index');

        }

    }

    public function download( Request $request)
    {
        $report = DB::table('reports')->where('user_id',Auth::user()->id)->where('topic_report_id',$request->topic_id)->get();
        $report = $report->first();
        return Storage::download("$report->path",$report->title.'.docx');

    }
}
