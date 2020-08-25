<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $activeMenu = "user-menu";

    public function index()
    {
        $users = User::all();
        return view('admin.user.index',[
            'activeMenu'=> $this->activeMenu,
            'users'=>$users
        ]);
    }

    public function create()
    {
        return view('admin.user.add-edit');
    }

    public function edit()
    {
        $users = User::all();
        return view('admin.user.index',[
            'activeMenu'=> $this->activeMenu,
            'users'=>$users
        ]);
    }

    public function delete()
    {
        $users = User::all();
        return view('admin.user.index',[
            'activeMenu'=> $this->activeMenu,
            'users'=>$users
        ]);
    }

    public function save()
    {
        $users = User::all();
        return view('admin.user.index',[
            'activeMenu'=> $this->activeMenu,
            'users'=>$users
        ]);
    }
}
