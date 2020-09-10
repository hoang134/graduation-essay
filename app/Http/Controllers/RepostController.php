<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepostController extends Controller
{
    public function create()
    {
        return view('home.repost');
    }
}
