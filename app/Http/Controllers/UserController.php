<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPost;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $activeMenu = "user-menu";

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return view('admin.user.index',[
            'activeMenu'=> $this->activeMenu,
            'users'=>$users
        ]);
    }

    public function create()
    {
        return view('admin.user.add-edit',[
            'activeMenu'=> $this->activeMenu,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($request->id);
        $this->authorize('update', $user);

        return view('admin.user.add-edit',[
            'activeMenu'=> $this->activeMenu,
            'user'=>$user
        ]);
    }

    public function delete(Request $request ,$id)
    {
       $user = User::find($request->id);
       $postIds = $user->posts->pluck('id');
        $user->posts()->delete();
        UserPost::whereIn('post_id', $postIds)->delete();
        $user->delete();
       return redirect()->route('user')->with('success', "Xóa thành công!");
    }

    public function save(Request $request)
    {


       if(!isset($request->id))
       {
           $request->validate([
               'name' => 'required|max:255',
               'birthday' => 'date',
               'gender' => 'required',
               'role' => 'required',
               'email' => 'required|email|max:255|unique:users',
               'password' => 'required|min:6',
               'password_confirmation' => 'required|same:password'
           ]);

           $user = new User();
           $user->name = $request->name;
           $user->birthday = $request->birthday;
           $user->code = $request->code;
           $user->gender = $request->gender;
           $user->email = $request->email;
           $user->class = $request->class;
           $user->password = bcrypt($request->password);
           $user->role = $request->role;
           $user->save();
           return redirect()->route('user')->with('success', "thêm tài khoản thành công");
       }
       else
       {   $request->validate([
           'name' => 'required|max:255',
           'gender' => 'required',
           'password_confirmation' => 'same:password'
       ]);

           $user = User::find($request->id);
           $user->name = $request->name;
           $user->birthday = $request->birthday;
           $user->gender = $request->gender;
           if (!$request->code == '')
             $user->code = $request->code;
           $user->email = $request->email;
           $user->class = $request->class;
           if (!$request->password == '')
                 $user->password = bcrypt($request->password);
           $user->save();

           return redirect()->route('user')->with('success', "sửa thành công!");
       }
    }
}
