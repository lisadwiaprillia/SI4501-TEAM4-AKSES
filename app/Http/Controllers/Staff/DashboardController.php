<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller; // Perhatikan perubahan di sini
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('admin.home');
    }
}
