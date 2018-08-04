<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;
use DB;

class AdminController extends Controller
{
    /*
     public function __construct()
    {
        $role = Session::get('role');
        dd($role);
        if($role == 'admin'){
            return redirect('/');
        }

    }
    */

    public function index(){

        $users = DB::select("select users.id,  users.name, users.email, roles.role from users INNER JOIN roles  ON users.id = roles.user_id WHERE roles.role = 'simple'");
        return view('layouts.dashboard', compact('users'));

    }

    public function createUser()
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',

        ]);


        $user = \App\User::where('email', '=', Input::get('email'))->first();
        if ($user === null) {
            \App\User::create([
                'name' => request('username'),
                'email' => request('email'),
                'password' =>  Hash::make(request('password')),
            ]);

            $userid = \App\User::where('email', request('email'))->first();
            \App\Roles::create([
                'user_id' => $userid->id,
                'role' => 'simple'
            ]);

            return redirect('/dashboard');
        }

        $errors['email'] = 'Email Already Exists!';
        return redirect()->back()->withInput()->withErrors($errors);
    }

    public function deleteUser($id){
        \App\User::destroy($id);
        return redirect('/dashboard');

    }

    public function viewBlogStatus(){
        $blogs = \App\Blogs::all();
        return view('layouts.blogstatus', compact('blogs'));
    }

    public function updateBlogStatus($id,$status){
        DB::table('blogs')
            ->where('id', $id)
            ->update(['status' => $status]);

        return redirect('/blogstatus');
    }
}
