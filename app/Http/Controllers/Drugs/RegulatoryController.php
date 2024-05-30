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
                'description' => 'required',
            ]);
    
            $regulatory = new DrugRegulatory;
            $regulatory->regulatory_name = $request->input('regulatory_name');
            $category->regulatory_desc = $request->input('regulatory_desc');
            $regulatory->save();
    
            // Tampilkan SweetAlert2 popup
            $response = [
                'status' => 'success',
                'message' => 'Data Regulasi ' . $regulatory->regulatory_name . 'Berhasil Disimpan'
            ];
    
            return view('Admin.Drugs.listRegulatory'); // Berikan respons JSON
    
        } catch (\Throwable $err) {
            dd($err);
        }
    }

    public function showEditRegulatoryForm($id)
    {
        $regulatory = drug_regulatories::find($id);
        return view('Admin.Drugs.editRegulatories', compact('regulatories'));
    }  

    public function listRegulatory()
    {
        $regulatory = DrugRegulatory::all();
        return view('Admin.Drugs.listRegulatory', compact('regulatory'));
    }

    public function editRegulatoryForm($id)
    {
        $regulatory = drug_regulatories::findOrFail($id);
        return view('Admin.Drugs.editRegulatory', compact('regulatories'));
    }

    public function updateRegulatoryData(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:drug_regulatories,regulatory_name,' . $id . ',regulatory_id',
                'description' => 'required',
            ]);

            $regulatory = drug_regulatories::findOrFail($id);
            $regulatory->regulatory_name = $request->input('name');
            $regulatory->regulatory_desc = $request->input('description');
            $regulatory->save();

            Session::flash('success-to-update-category', 'Data Kategori ' . $category->category_name . ' Berhasil Diperbarui');

            return redirect(url('/list/regulatories'));
        } catch (\Throwable $err) {
            dd($err);
        }
    }
    
    public function deleteRegulatory($id)
    {
    try {
        $regulatory = drug_regulatories::findOrFail($id);
        $regulatory->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menghapus kategori'], 500);
    }
}
}
