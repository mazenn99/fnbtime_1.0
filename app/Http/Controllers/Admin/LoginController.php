<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('admin.login');
    }

    protected function login(AdminRequest $request) {
        if(Auth::guard('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')] , $request->input('remember'))){
            return redirect()->to(route('admin.dashboard'));
        } else {
            return redirect()->back()->with(['error' => 'Email or Password not Correct']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->to(route('admin-login'))->with(['success' => 'Logged out successfully']);
    }
}
