<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function showEducationPage()
    {
        return view('Education.EduPage');
    }
}
