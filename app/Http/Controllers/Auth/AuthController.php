<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SetupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function index()
    {
        // check if no users redirect to setup
        if (User::count() == 0) {
            return redirect('setup');
        }
        return view('components.view.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors('Email atau password salah')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function setup()
    {
        abort_if(User::count() > 0, 403, 'Forbidden');
        return view('components.view.setup');
    }
    public function setup_process(SetupRequest $request)
    {
        abort_if(User::count() > 0, 403, 'Forbidden');
        try {
            DB::beginTransaction();
            User::create($request->all());
            DB::commit();
            return redirect('login');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan');
        }
    }
}
