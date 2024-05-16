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
    public function show_drug_data()
    {
        $drugs_data = DrugData::all()->sortBy('created_at');
        return view('Admin.Drugs.drug-data', [
            'drugs_data' => $drugs_data,
        ]);
    }

    public function show_detail_d(Request $request)
    {
        $drug_data = DrugData::find($request->data_id);
        return view('Admin.Drugs.data-detail', [
            'drugs_data' => $drug_data,
        ]);
    }

    public function show_create_data_form()
    {
        $drugs = Drug::all()->sortBy('created_at');
        return view('Admin.Drugs.create-data', [
            'drugs' => $drugs
        ]);
    }

    public function store_drug_data_data(Request $request)
    {
        try {
            $drug_data = new DrugData;

            $drug_data_validation = $request->validate([
                'form' => 'required|unique:drug_data',
                'packaging_and_price' => 'required',
            ]);

            $drug_data->form = $drug_data_validation['form'];
            $drug_data->packaging_and_price = $drug_data_validation['packaging_and_price'];
            $drug_data->save();

            Session::flash('success-to-create-data', 'Data Obat ' . $drug_data_validation['form'] . ' Berhasil Dibuat');

            return redirect(url('/drugs/create-drug=data'));
        } catch (\Throwable $err) {
            dd($err);
        }
    }

    public function show_edit_data_form(Request $request)
    {
        $drug_data = DrugData::find($request->data_id);
        return view('Admin.Drugs.edit-data', [
            'drug_data' => $drug_data
        ]);
    }

    public function update_drug_data(Request $request)
    {
        $drug_data = DrugData::find($request->data_id);
        $drug_data->form = $request->form;
        $drug_data->packaging_and_price = $request->packaging_and_price;
        $drug_data->update();

        Session::flash('success-to-update-drug-data', 'Data Obat ' . $drug_data->form . ' Berhasil Diperbaharui');

        return redirect(url('/drug/data'));
    }

    public function destroy_data0_data(Request $request)
    {
        $drug_data = DrugData::find($request->data_id);
        $drug_data->delete();

        Session::flash('success-to-delete-drug-data', 'Data Data Obat ' . $drug_data->form . ' Berhasil Dihapus');

        return redirect(url('/drug/data'));
    }
}
