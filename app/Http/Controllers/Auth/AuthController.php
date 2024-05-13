<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        // todo
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
        // todo
    }
}
