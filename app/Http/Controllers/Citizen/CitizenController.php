<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CitizenController extends Controller
{
    public function index()
    {
        return view('Citizen.Home.index');
    }

    public function cariObat()
    {
        return view('Citizen.Home.cari-obat');
    }
    
    public function educationPage()
    {
        $comments = Comment::whereNull('parent_id')->with('replies')->get();
        return view('Citizen.Home.education-page', compact('comments'));
    }
}
