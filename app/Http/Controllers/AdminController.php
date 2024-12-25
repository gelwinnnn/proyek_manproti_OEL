<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }
    public function login()
    {
        $data['title'] = 'Admin Login';
        return view('admin.login', $data);
    }

    public function auth(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        if (($admin && Hash::check($request->password, $admin->password))) {
            session()->put('id', $admin->id);
            session()->put('username', $admin->username);
            session()->put('name', $admin->name);

            return redirect()->route('admin.index')->with('success', 'Login berhasil!');
        } else {
            return redirect()->route('admin.login')->with('error', 'Username atau password salah!');
        }
    }
}
