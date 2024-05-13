<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function index()
    {
        return view('Citizen.Home.index');
    }
}
