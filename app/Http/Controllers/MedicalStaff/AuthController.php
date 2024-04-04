<?php

namespace App\Http\Controllers\MedicalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
