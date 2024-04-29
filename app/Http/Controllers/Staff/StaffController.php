<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Institution;
use App\Models\User;

class StaffController extends Controller
{
    public function showRequestForm()
    {
        return view('Institution.request-staff');
    }

    public function storeTicket(Request $request)
    {
        $institution = Institution::where('institution_ticket_code',  $request->institution_ticket_code)->first();

        if ($institution == null) {
            Session::flash('failed-to-found-ticket', 'Data Tiket Institusi Tidak Valid');
            return back();
        }

        if ($institution->institution_status == 'Pending' || $institution->institution_status == 'Ditolak') {
            Session::flash('institution-not-valid', 'Maaf, Tiket Institusi Yang DImiliki Tidak Valid');
            return back();
        }

        Session::put('validToken', true);

        return redirect(url('/register'))->with([
            'institution_id' => $institution->institution_id
        ]);
    }

    public function showStaffRequest()
    {
        $users = User::with('institution')->where('user_status', 'pending')->get();
        return view('Admin.Staff.staff-request', compact('users'));
    }
}
