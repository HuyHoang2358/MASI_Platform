<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected string $redirectTo = '/admin';


    public function guard(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
    {
        return Auth::guard('admin');
    }

    public function showLoginForm(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        if (Auth::guard('admin')->attempt(
            ['email' => $input['email'], 'password' =>$input['password']],$request->remember
        )) return redirect()->route('admin.home');
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(): \Illuminate\Http\RedirectResponse{
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
