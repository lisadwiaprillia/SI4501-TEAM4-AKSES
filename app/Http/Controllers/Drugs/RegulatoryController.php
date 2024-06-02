<?php

namespace App\Http\Controllers\Drugs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\DrugRegulatory;

class RegulatoryController extends Controller
{
    public function showRegulatoryForm()
    {
        $regulatories = DrugRegulatory::all();
        return view('Admin.Drugs.showRegulatory', compact('regulatories'));
    }

    public function storeRegulatoryData(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:drug_regulatories,regulatory_name',
                'desc' => 'required|unique:drug_regulatories,regulatory_desc'
            ]);
    
            $regulatory = new DrugRegulatory;
            $regulatory->regulatory_name = $request->input('name');
            $regulatory->regulatory_desc = $request->input('desc');
            $regulatory->save();
    
            // Tampilkan SweetAlert2 popup
            $response = [
                'status' => 'success',
                'message' => 'Data Regulasi ' . $regulatory->regulatory_name . 'Berhasil Disimpan'
            ];
    
            //return view('Admin.Drugs.listRegulatory'); // Berikan respons JSON
            return response()->json($response);
    
        } catch (\Throwable $err) {
            dd($err);
        }
    }

    public function showEditRegulatoryForm($id)
    {
        $regulatory = DrugRegulatory::find($id);
        return view('Admin.Drugs.editRegulatory', compact('regulatory'));
    }  

    public function listRegulatory()
    {
        $regulatory = DrugRegulatory::all();
        return view('Admin.Drugs.listRegulatory', compact('regulatory'));
    }

    public function editRegulatoryForm($id)
    {
        $regulatory = DrugRegulatory::findOrFail($id);
        return view('Admin.Drugs.editRegulatory', compact('regulatory'));
    }

    public function updateRegulatoryData(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:drug_regulatories,regulatory_name,' . $id . ',regulatory_id',
                'description' => 'required',
            ]);

            $regulatory = DrugRegulatory::findOrFail($id);
            $regulatory->regulatory_name = $request->input('name');
            $regulatory->regulatory_desc = $request->input('description');
            $regulatory->save();

            Session::flash('success-to-update-regulatory', 'Data Kategori ' . $regulatory->regulatory_name . ' Berhasil Diperbarui');

            return redirect(url('/list/regulatories'));
        } catch (\Throwable $err) {
            dd($err);
        }
    }
    
    public function deleteRegulatory($id)
    {
    try {
        $regulatory = DrugRegulatory::findOrFail($id);
        $regulatory->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menghapus kategori'], 500);
    }
}
}
