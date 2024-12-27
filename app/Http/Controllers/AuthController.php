<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login')->with('success', 'Successfully logged out!');
    }
}
