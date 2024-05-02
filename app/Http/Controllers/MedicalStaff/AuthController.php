<?php

namespace App\Http\Controllers\MedicalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        {
            $UserEmailInput = $request->input('user_email');
    
            $user = DB::table('users')->select('user_id', 'name', 'user_email', 'user_password', 'role_id')->where('user_email', $UserEmailInput)->get();
    
            $UserPaswordInput = $request->input('user_password');
    
            if (!count($user) == 1) {
                return back()->with('login', 'Proses Login Gagal');
            }
    
            if (!Hash::check($userPaswordInput, $user[0]->user_password)) {
                $request->session()->put('isAuthorize', false);
                return back()->with('login', 'Proses Login Gagal');
            }
    
            $request->session()->put('isAuthorize', true);
            $request->session()->put("user", $user[0]->name);
            $request->session()->put('user_id', $user[0]->user_id);
    
    
            if ($user[0]->role_id == 1) {
                $request->session()->put('role_id', true);
            }
    
            return redirect(route('admin.dashboard'))->with('loginSuccess', 'Proses Login berhasil');
        }
    }
}