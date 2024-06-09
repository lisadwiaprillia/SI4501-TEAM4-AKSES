<?php

namespace App\Http\Controllers\Drugs;

use App\Models\DrugPresentation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PresentationController extends Controller
{
    public function show_drug_presentation()
    {
        $drugs_presentation = DrugPresentation::all()->sortBy('created_at');
        return view('Admin.Drugs.drug-presentations', [
            'drugs_presentations' => $drugs_presentation,
        ]);
    }

    public function show_detail_presentation(Request $request)
    {
        $drug_presentation = DrugPresentation::find($request->presentation_id);
        return view('Admin.Drugs.presentation-detail', [
            'drugs_presentation' => $drug_presentation,
        ]);
    }

    public function show_create_presentation_form()
    {
        $drugs = DrugPresentation::all()->sortBy('created_at');
        return view('Admin.Drugs.create-presentation', [
            'drugs' => $drugs
        ]);
    }

    public function store_drug_presentation_data(Request $request)
    {
        try {

            $drug_presentations = new DrugPresentation;

            $drug_presentation_validation = $request->validate([
                'form' => 'required|unique:drug_presentations',
                'packaging_and_price' => 'required',
            ]);

            $drug_presentations->form = $drug_presentation_validation['form'];
            $drug_presentations->packaging_and_price = $drug_presentation_validation['packaging_and_price'];
            $drug_presentations->save();

            Session::flash('success', 'Data Presentasi ' . $drug_presentation_validation['form'] . ' Berhasil Dibuat');

            return redirect(url('/drug/presentations'));
        } catch (\Throwable $err) {
            dd($err);
        }
    }

    public function show_edit_presentation_form(Request $request)
    {
        $drug_presentation = DrugPresentation::find($request->presentation_id);
        return view('Admin.Drugs.edit-presentation', [
            'drug_presentation' => $drug_presentation
        ]);
    }

    public function update_drug_presentation_data(Request $request)
    {
        $drug_presentation = DrugPresentation::find($request->presentation_id);
        $drug_presentation->form = $request->form;
        $drug_presentation->packaging_and_price = $request->packaging_and_price;
        $drug_presentation->update();

        Session::flash('success', 'Data Presentasi ' . $drug_presentation->form . ' Berhasil Diperbaharui');

        return redirect(url('/drug/presentations'));
    }

    public function destroy_presentation_data(Request $request)
    {
        try {
            $drug_presentation = DrugPresentation::findOrFail($request->presentation_id);
            $drug_presentation->delete();
            Session::flash('success', 'Data Presentasi Obat ' . $drug_presentation->form . ' Berhasil Dihapus');

            return redirect(url('/drug/presentations'));
        } catch (\Throwable $err) {
            Session::flash('error', 'Data Sediaan' . $err->getMessage());
            return back();
        }
    }
}
