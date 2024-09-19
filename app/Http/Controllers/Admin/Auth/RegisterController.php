<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $account = Admin::create([
            'name' => $input["name"],
            'email' => $input["email"],
            'password' => bcrypt($input["password"]),
            'profile_photo_path' => "",
        ]);
        return redirect()->route('admin.login');
    }
}
