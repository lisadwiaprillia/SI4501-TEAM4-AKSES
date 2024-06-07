<?php

namespace App\Http\Controllers\Drugs;

use App\Models\DrugData;
use App\Models\Drug;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class DataController extends Controller
{
    // Menampilkan semua data obat
    public function show_drug_data()
    {
        $drugs_data = Drug::orderBy('created_at')->get();
        return view('Admin.Drugs.drug-data', compact('drugs_data'));
    }

    // Menampilkan detail data obat
    public function show_detail_data($data_id)
    {
        $drug_data = Drug::findOrFail($data_id);
        return view('Admin.Drugs.data-detail', compact('drug_data'));
    }

    // Menampilkan form untuk membuat data obat baru
    public function show_create_data_form()
    {
        $drugs = Drug::orderBy('created_at')->get();
        return view('Admin.Drugs.create-data', compact('drugs'));
    }

    // Menyimpan data obat baru
    public function store_drug_data_data(Request $request)
    {
        try {
            $drug_data = new Drug;

            $drug_data_validation = $request->validate([
                'content' => 'required|unique:drug_data',
                'indication' => 'required',
                'reaction' => 'required',
                'classification' => 'required',
                'warning' => 'required',
                'contraindication' => 'required',
                'dosage' => 'required',
                'interaction' => 'required',
                'regulation' => 'required',
                'drug_category' => 'required',
            ]);

            $drug_data->content = $drug_data_validation['content'];
            $drug_data->indication = $drug_data_validation['indication'];
            $drug_data->reaction = $drug_data_validation['reaction'];
            $drug_data->classification = $drug_data_validation['classification'];
            $drug_data->warning = $drug_data_validation['warning'];
            $drug_data->contraindication = $drug_data_validation['contraindication'];
            $drug_data->dosage = $drug_data_validation['dosage'];
            $drug_data->interaction = $drug_data_validation['interaction'];
            $drug_data->regulation = $drug_data_validation['regulation'];
            $drug_data->drug_category = $drug_data_validation['drug_category'];
            $drug_data->save();

            Session::flash('success-to-create-data', 'Data Obat' . $drug_data_validation['form'] . ' Berhasil Dibuat');

            return redirect(url('/drugs/create-drug=data'));
        } catch (\Throwable $err) {
            dd($err);
        }
    }

    public function store_drug_presentation_data(Request $request)
    {
        
    }

    // Menampilkan form untuk mengedit data obat
    public function show_edit_data_form($data_id)
    {
        $drug_data = DrugData::findOrFail($data_id);
        return view('Admin.Drugs.edit-data', compact('drug_data'));
    }

    // Memperbarui data obat yang ada
    public function update_drug_data_data(Request $request, $data_id)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'indication' => 'required',
            'reaction' => 'required',
            'classification' => 'required',
            'warning' => 'required',
            'contraindication' => 'required',
            'dosage' => 'required',
            'interaction' => 'required',
            'regulation' => 'required',
            'drug_category' => 'required',
        ]);

        $drug_data = Drug::findOrFail($data_id);
        $drug_data->update($validatedData);

        Session::flash('success-to-update-drug-data', 'Data Obat ' . $validatedData['form'] . ' Berhasil Diperbaharui');

        return redirect()->route('drugs.index');
    }

    // Menghapus data obat
    public function destroy_data($data_id)
    {
        $drug_data = Drug::findOrFail($data_id);
        $drug_data->delete();

        Session::flash('success-to-delete-drug-data', 'Data Data Obat ' . $drug_data->form . ' Berhasil Dihapus');

        return redirect()->route('drugs.index');
    }
}