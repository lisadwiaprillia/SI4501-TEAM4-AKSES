<?php

namespace App\Http\Controllers\Drugs;

use App\Models\DrugData;
use App\Models\Drug;

use App\Http\Controllers\Controller;
use App\Models\DrugClass;
use App\Models\DrugPresentation;
use App\Models\DrugRegulatory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class DataController extends Controller
{
    public function show_drug_data()
    {
        $drugs_data = Drug::with('drug_class')->orderBy('created_at')->get();
        return view('Admin.Drugs.drug-data', [
            'drugs_data' => $drugs_data
        ]);
    }

    public function show_detail_data(Request $request)
    {
        $drug_data = Drug::with(['drug_class', 'drug_presentation', 'drug_regulatory'])->findOrFail($request->drug_id);
        return view('Admin.Drugs.data-detail', [
            'drug_data' => $drug_data
        ]);
    }

    // Menampilkan form untuk membuat data obat baru
    public function show_create_data_form()
    {
        $drug_presentation = DrugPresentation::orderBy('form')->get();
        $drug_class = DrugClass::orderBy('class_name')->get();
        $drug_regulatory = DrugRegulatory::orderBy('regulatory_name')->get();
        return view('Admin.Drugs.create-data', [
            'drug_presentation' => $drug_presentation,
            'drug_class' => $drug_class,
            'drug_regulatory' => $drug_regulatory
        ]);
    }

    public function store_drug_data_data(Request $request)
    {
        try {
            $drug_data = new Drug;

            $drug_data_validation = $request->validate([
                'drug_name' => 'required',
                'contents' => 'required',
                'indications' => 'required',
                'dosage' => 'required',
                'contraindication' => 'required',
                'special_precautions' => 'required',
                'drug_interaction' => 'required',
                'adverse_reactions' => 'required',
                'atc_classification' => 'required',
                'presentation_id' => 'required',
                'class_id' => 'required',
                'regulatory_id' => 'required',
            ]);

            $drug_data->drug_name = $drug_data_validation['drug_name'];

            $drug_data->contents = $drug_data_validation['contents'];

            $drug_data->indications = $drug_data_validation['indications'];

            $drug_data->dosage = $drug_data_validation['dosage'];

            $drug_data->contraindication = $drug_data_validation['contraindication'];

            $drug_data->special_precautions = $drug_data_validation['special_precautions'];

            $drug_data->drug_interaction = $drug_data_validation['drug_interaction'];

            $drug_data->adverse_reactions = $drug_data_validation['adverse_reactions'];

            $drug_data->atc_classification = $drug_data_validation['atc_classification'];

            $drug_data->presentation_id = $drug_data_validation['presentation_id'];

            $drug_data->class_id = $drug_data_validation['class_id'];

            $drug_data->regulatory_id = $drug_data_validation['regulatory_id'];

            $drug_data->save();

            Session::flash('success', 'Data Obat' . $drug_data->drug_name . ' Berhasil Dibuat');

            return redirect(url('/drugs/create-drug-data'));
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function show_edit_data_form(Request $request)
    {
        $drug_presentation = DrugPresentation::orderBy('form')->get();
        $drug_class = DrugClass::orderBy('class_name')->get();
        $drug_regulatory = DrugRegulatory::orderBy('regulatory_name')->get();

        $drug_data = Drug::with(['drug_class', 'drug_presentation', 'drug_regulatory'])->findOrFail($request->drug_id);
        return view('Admin.Drugs.edit-data', [
            'drug_data' => $drug_data,
            'drug_presentation' => $drug_presentation,
            'drug_class' => $drug_class,
            'drug_regulatory' => $drug_regulatory
        ]);
    }


    public function update_drug_data_data(Request $request, $data_id)
    {
        try {
            $drug_data_validation = $request->validate([
                'drug_name' => 'required',
                'contents' => 'required',
                'indications' => 'required',
                'dosage' => 'required',
                'contraindication' => 'required',
                'special_precautions' => 'required',
                'drug_interaction' => 'required',
                'adverse_reactions' => 'required',
                'atc_classification' => 'required',
                'presentation_id' => 'required',
                'class_id' => 'required',
                'regulatory_id' => 'required',
            ]);

            $drug_data = Drug::findOrFail($data_id);
            $drug_data->update($drug_data_validation);

            Session::flash('success-to-update-drug-data', 'Data Obat ' . $drug_data->drug_name . ' Berhasil Diperbaharui');

            return redirect(url('/drug/data'));
        } catch (\Throwable $err) {

            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function destroy_drug_data(Request $request)
    {

        try {
            $drug_data = Drug::findOrFail($request->drug_id);
            $drug_data->delete();

            Session::flash('success', 'Data Data Obat ' . $drug_data->drug_name . ' Berhasil Dihapus');

            return redirect(url('/drug/data'));
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }
}
