<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Validation\ValidationException;

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

    public function showStaff()
    {
        return view('Admin.Staff.getStaff');
    }

    public function showStaffDetail(Request $request)
    {
        try {
            $staff = User::find($request->user_id);
            return view(
                'Admin.Staff.detail-staff',
                ['staff' => $staff]
            );
        } catch (ValidationException $error) {
            dd($error);
        }
    }

    public function showEditStaffForm(Request $request)
    {
        $staff = User::find($request->user_id)->first();
        return view('Admin.staff.edit-staff', ['staff' => $staff]);
    }

    public function updateStaffData(Request $request)
    {

        $staff = User::find($request->user_id);

        $staff->name = $request->name;
        $staff->user_email = $request->user_email;
        $staff->user_phone = $request->user_phone;
        $staff->user_address = $request->user_address;

        if (!$request->user_evidence == null) {
            $imagePath = $request->file('user_evidence')->store('verification-evidence', 'public');
            $staff->user_evidence = $imagePath;
        } else {
            $staff->user_evidence = $staff->user_evidence;
        }
        $staff->update();

        Session::flash('success-to-update-staff', 'Data Staff Pegawai ' . $staff->name . ' Berhasil Di Perbaharui');

        return redirect(url('/health-staff'));
    }

    public function burnStaff(Request $request)
    {
        try {
            $staff = User::find($request->user_id);
            $staff->delete();
            Session::flash('success-to-delete-staff', 'Data Pegawai ' . $staff->name . ' Berhasil Dihapus');
            return back();
        } catch (ValidationException $error) {
            dd($error);
        }
    }


    public function show_admin_dashboard()
    {
        return view('Admin.home', [
            'total_drug' => Drug::count(),
            'total_admin' => User::where('role_id', '=', '3')->count(),
            'total_apoteker' => User::where('role_id', '=', '4')->count(),
            'total_user' => User::count(),
        ]);
    }

    public function accept_staff(Request $request)
    {
        try {
            $staff = User::with('role')->findOrFail($request->user_id);
            $staff->user_status = 'diterima';
            $staff->role_id = 3;
            $staff->update();
            return back();
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }
}
