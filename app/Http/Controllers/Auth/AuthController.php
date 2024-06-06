<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {

        $UserEmailInput = $request->input('user_email');

        $user = DB::table('users')->select('user_id', 'name', 'user_email', 'user_password', 'role_id')->where([['user_email', '=', $UserEmailInput], ['user_status', '=', 'diterima']])->get();

        $UserPaswordInput = $request->input('user_password');

        if (!count($user) == 1) {
            return back()->with('login', 'email atau password salah, atau akun belum aktif');
        }

        if (!Hash::check($UserPaswordInput, $user[0]->user_password)) {
            $request->session()->put('isAuthorize', false);
            return back()->with('login', 'Proses Login Gagal');
        }
        $request->session()->put('isAuthorize', true);
        $request->session()->put("user", $user[0]->name);
        $request->session()->put('user_id', $user[0]->user_id);
        Session::put('isApoteker', $user[0]->role_id === 3 ? true : false);
        Session::put('isAdmin', $user[0]->role_id === 4 ? true : false);

        return redirect(url('/staff-dashboard'))->with('loginSuccess', 'Proses Login berhasil');
    }

    public function showRegisterForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        try {
            $userData = $request->validate([
                'name' => 'required|unique:users',
                'user_phone' => 'required|unique:users',
                'user_address' => 'required',
                'user_email' => 'required|unique:users',
                'user_password' => 'required|min:5',
                'user_status' => 'nullable',
                'user_evidence' => 'required|mimes:jpg,png|max:2048',
                'role_id' => 'nullable',
                'institution_id' => 'required'
            ]);

            $imagePath = $request->file('user_evidence')->store('user-evidence', 'public');

            $user = new User;
            $user->user_email = $userData['user_email'];
            $user->name = $userData['name'];
            $user->user_phone = $userData['user_phone'];
            $user->user_address = $userData['user_address'];
            $user->user_status = 'pending';
            $user->user_evidence = $imagePath;
            $user->user_password = bcrypt($userData['user_password'], ['rounds' => 12]);
            $user->institution_id = $userData['institution_id'] ? $userData['institution_id'] : session('institution_id');
            Session::forget('institution_id');
            $user->role_id = 1;
            $user->save();

            Session::flash('success-to-register', 'Berhasil Melakukan Proses Registrasi');

            return redirect(url('/login'));
        } catch (ValidationException $error) {
            dd($error);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('isAuthorize');
        Session::forget('user');
        Session::forget('role_id');
        Session::forget('user_id');
        return redirect(url('/'));
    }
}
