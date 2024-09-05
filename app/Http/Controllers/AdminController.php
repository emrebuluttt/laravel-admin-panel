<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        if (auth()->check()) {  // oturum açıldığının kontrolunu yapar
            return redirect()->route('admin.index'); // redirect yönlendirme yapar
        }
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function forgetPassword()
    {
        return view('admin.forget-password');
    }
}
