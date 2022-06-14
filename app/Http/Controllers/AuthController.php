<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/check');
        }else{
            return redirect()->route('login')->with('gagal', 'Data yang kamu masukkan tidak ditemukan');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function showRegisterForm()
    {
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('login');
    }
}
