<?php

namespace App\Http\Controllers;

use App\Messenger;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessengerController extends Controller
{
    public function student()
    {

        $messengers = DB::table('messengers')->where('user_id_from',Auth::user()->id)
        ->orWhere('user_id_to',Auth::user()->id)->get();

        $lecturer = Auth::user()->posts->first()->lecturer->first();
        $assessor = DB::table("users")->where('role',User::ROLE_ASSESSOR)->get()->first();
        return view('student.messengers.index',[
            'messengers'=>$messengers,
            'lecturer'=>$lecturer,
            'assessor'=>$assessor
        ]);

    }

    public function lecturer(Request $request)
    {

        $idStudent = $request->id;

        $messengers = DB::table('messengers')->where('user_id_from',Auth::user()->id)
            ->where('user_id_to',$request->id)
            ->orWhere('user_id_to',Auth::user()->id)->where('user_id_from',$request->id)->get();

        return view('admin.messenger.lecturer',[
            'messengers'=>$messengers,
            'idStudent'=>$idStudent
        ]);


    }

    public function assessor(Request $request)
    {
        $idStudent = $request->id;

        $messengers = DB::table('messengers')->where('user_id_from',Auth::user()->id)
            ->where('user_id_to',$request->id)
            ->orWhere('user_id_to',Auth::user()->id)->where('user_id_from',$request->id)->get();

        return view('admin.messenger.assessor',[
            'messengers'=>$messengers,
            'idStudent'=>$idStudent
        ]);

    }

    public function save(Request $request)
    {
        $messenger = new Messenger();
        $messenger->user_id_from = Auth::user()->id;
        $messenger->content = $request->messenger;
        $messenger->user_id_to = $request->id;
        $messenger->save();

    }
}
