<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.home');
    }

    public function loginAdmin() {
        if (auth()->check()) {
            redirect()->to('admin/home');
        }
        return view ('admin.login');
    }

    public function postLoginAdmin(Request $request) {
        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->to('admin/home');
        }
        else {
            session()->put('message', 'Password or username is incorrect. Please try again.');
            return redirect()->back();
        }
    }

    public function logoutAdmin(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('admin');
    }
}
