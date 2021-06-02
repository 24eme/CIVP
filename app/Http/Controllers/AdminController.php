<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = ($request->remember)? true : false;
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'Identifiants non connus',
        ]);
    }

    public function authenticated(Request $request)
    {
      if (!Auth::check()) {
        return redirect()->route('authenticate');
      }
      return view('admin/authenticated', ['user' => Auth::user()]);
    }

    public function logout(Request $request)
    {
        if (!Auth::check()) {
          return redirect()->route('authenticate');
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('index') . '#nav-liste');
    }

    public function login(Request $request)
    {
      if (Auth::check()) {
        return redirect()->route('authenticated');
      }
      return view('admin/login');
    }
}
