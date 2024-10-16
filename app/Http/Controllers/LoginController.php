<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

       if (!$user) {
           return back()->withErrors([
               'username' => 'Username yang Anda masukkan salah',
           ]);
       } elseif (!Hash::check($credentials['password'], $user->password)) {
    return back()->withErrors([
        'password' => 'Password yang Anda masukkan salah',
    ]);
        }
        else {
           Auth::login($user);
           return redirect()->intended('admin.dashboard');
       }

        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
