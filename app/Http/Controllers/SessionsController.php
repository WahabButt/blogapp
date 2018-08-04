<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SessionsController extends Controller
{
    public function create(){

        return view('layouts.login');
    }

    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password') ])) {
            $email = $request->input('email');
            $user = DB::select("SELECT users.id,  users.name, users.email, roles.role FROM users INNER JOIN roles  ON users.id = roles.user_id WHERE email = '$email'");
//            dd($user[0]->name);
            $request->session()->flush();
            $request->session()->put('id', $user[0]->id);
            $request->session()->put('name', $user[0]->name);
            $request->session()->put('email', $user[0]->email);
            $request->session()->put('role', $user[0]->role);
            if($user[0]->role == 'admin'){
                return redirect('/dashboard');
            }
            if($user[0]->role == 'simple'){
                return redirect('/posts/create');
            }
        }

    }

    public function destroy(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
