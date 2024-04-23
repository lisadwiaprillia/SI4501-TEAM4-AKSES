<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

use App\Models\Institution;

class InstitutionController extends Controller
{
    public function showInstitutionForm()
    {
        return view('Institution.create-institution');
    }

    public function showVerificationInfo()
    {
        return view('Institution.information-page-institution');
    }

    public function showVerificationStatus()
    {
        return view('Institution.check-status');
    }

    public function VerificationStatus(Request $request)
    {
        try {
            $institution = Institution::where('institution_ticket_code', $request->institution_ticket)->first();
            if ($institution != null) {
                return view('Institution.status-result')->with(compact('institution'));
            } else {
                Session::flash('ticket-not-found', 'Kode Tiket Yang Dimasukan Tidak Valid');
                return back();
            }
        } catch (ValidationException $error) {
            dd($error);
        }
    }

    public function store(Request $request)
    {
        try {

            $institutionData = $request->validate([
                'institution_name' => 'required|unique:institutions',
                'institution_phone' => 'required|unique:institutions',
                'institution_address' => 'required',
                'institution_chairman' => 'required',
                'institution_status' => 'nullable',
                'institution_evidence' => 'required|file|mimes:png,jpg|max:2048',
            ]);

            $imagePath = $request->file('institution_evidence')->store('verification-evidence', 'public');

            $institution = new Institution;
            $institution->institution_name = $institutionData['institution_name'];
            $institution->institution_phone = $institutionData['institution_phone'];
            $institution->institution_address = $institutionData['institution_address'];
            $institution->institution_chairman = $institutionData['institution_chairman'];
            $institution->institution_evidence = $imagePath;
            $institution->institution_ticket_code = Str::random(8) . uniqid();
            $institution->institution_status = 'pending';
            $institution->save();

            Session::flash('ticket-request-success', 'Proses Pengajuan Verifikasi Institutasi Berhasil!');

            $requestTicket = $institution->institution_ticket_code;

            $resultData = [
                'ticket' => $requestTicket,
                'institution_name' => $institutionData['institution_name'],
                'institution_address' => $institutionData['institution_address'],
                'institution_phone' => $institutionData['institution_phone']
            ];

            return redirect(url('/health-institution/verification'))->with('resultData', $resultData);
        } catch (ValidationException $error) {
            dd($error);
        }
    }


    // ! Restricted Access

    public function showInstitutionDetail(Request $request)
    {
        $institution = Institution::find($request->institution_id);
        return view('Institution.detail-institution', ['institution' => $institution]);
    }

    public function showVerificationData()
    {
        $institutions = Institution::where('institution_status', 'Pending')->get();
        return view('Admin.Institution.verification-request', ['institutions' => $institutions]);
    }

    public function updateStatus(Request $request)
    {
        $institution = Institution::find($request->institution_id);
        $institution->institution_status = 'Diterima';
        $institution->update();
        Session::flash('accepting-request', 'Proses Pengajuan Telah Berhasil Di Terima');
        return back();
    }

    public function rejectStatus(Request $request)
    {
        $institution = Institution::find($request->institution_id);
        $institution->institution_status = 'Ditolak';
        $institution->update();
        Session::flash('rejecting-request', 'Proses Pengajuan Telah Berhasil Di Tolak');
        return back();
    }

    public function showInstitutions()
    {
        return view('Admin.Institution.institutions');
    }

    public function destroyInstitution(Request $request)
    {
        try {
            $institution = Institution::find($request->institution_id)->first();
            $institution->delete();
            Session::flash('success-to-delete-institution', 'Data Institutsi ' . $institution->institution_name . ' Berhasil Dihapus');
            return back();
        } catch (ValidationException $error) {
            dd($error);
        }
    }

    public function showEditInstitutionForm(Request $request)
    {
        $institution = Institution::find($request->institution_id)->first();
        return view('Admin.Institution.edit-institution', ['institution' => $institution]);
    }

    public function updateInstitutionData(Request $request)
    {

        $institution = Institution::find($request->institution_id);

        $institution->institution_ticket_code = $request->institution_ticket_code;
        $institution->institution_name = $request->institution_name;
        $institution->institution_phone = $request->institution_phone;
        $institution->institution_address = $request->institution_address;
        $institution->institution_chairman = $request->institution_chairman;

        if (!$request->institution_evidence == null) {
            $imagePath = $request->file('institution_evidence')->store('verification-evidence', 'public');
            $institution->institution_evidence = $imagePath;
        } else {
            $institution->institution_evidence = $institution->institution_evidence;
        }

        $institution->institution_status = $request->institution_status;
        $institution->update();

        Session::flash('success-to-update-institution', 'Data Institusi ' . $institution->institution_name . ' Berhasil Di Perbaharui');

        return redirect(url('/health-institution'));
    }

    public function InstitutionMoreDetail(Request $request)
    {
        $institution = Institution::find($request->institution_id)->first();

        return view('Admin.Institution.institution-more-detail', [
            'institution' => $institution,
            'image_url' => asset('storage/' . $institution->institution_evidence),
        ]);
    }
}
