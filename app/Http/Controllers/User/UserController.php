<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home()
    {
        $courses = course::all();
        return view('home', compact('courses'));
    }

    public function register()
    {
        return view("Auth.Register");
    }

    public function registerUser(Request $request)
    {
        $dataForm = $request->all();
        User::create($dataForm);
        return redirect()->route(('login'));
    }

    public function login()
    {
        return view("Auth.login");
    }

    public function loginAdmin(Request $request)
    {
        $user = User::where("username", $request->username)->where("role", 1)->first();
        if ($user && Hash::check($request->password,$user->password)) {
            Auth::login($user);
            return redirect()->route(('admin.panel'));
        }else{
            return abort('404');
        }

    }
}
