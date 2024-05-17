<?php

namespace App\Http\Controllers\Drugs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

use App\Models\DrugClass;
use Exception;

class ClassController extends Controller
{
    public function showDrugClasses()
    {
        $drug_classes = DrugClass::orderBy('created_at')->get();
        return view('Admin.Drugs.drugs-class', [
            'drug_classes' => $drug_classes
        ]);
    }

    public function showCreateClassForm()
    {
        return view('Admin.Drugs.create-class');
    }

    public function storeDrugClassData(Request $request)
    {
        try {

            $drugs_class_validation_data = $request->validate([
                'class_name' => 'required|unique:drug_classes',
                'class_desc' => 'required'
            ]);

            $drug_classes = new DrugClass;
            $drug_classes->class_name = $drugs_class_validation_data['class_name'];
            $drug_classes->class_desc = $drugs_class_validation_data['class_desc'];
            $drug_classes->save();

            Session::flash('success-to-create-class', 'Data kelas ' . $drugs_class_validation_data['class_name'] . ' Berhasil Dibuat');

            return redirect(url('/drugs/class/create-form'));
        } catch (ValidationException $error) {
            Session::flash('error', $error->getMessage());
            return back();
        }
    }

    public function showDetailDrugClass(Request $request)
    {
        $drug_class = DrugClass::find($request->class_id);

        if (!$drug_class) {
            Session::flash('error', 'Maaf, data tidak ditemukan');
            return back();
        }

        return view('Admin.Drugs.class-detail', [
            'drug_class' => $drug_class
        ]);
    }

    public function showEditClassForm(Request $request)
    {
        $drug_class = DrugClass::find($request->class_id);
        return view('Admin.Drugs.edit-class', [
            'drug_class' => $drug_class
        ]);
    }

    public function updateDrugClass(Request $request)
    {
        try {
            $drug_class = DrugClass::find($request->class_id);
            $drug_class->class_name = $request->class_name;
            $drug_class->class_desc = $request->class_desc;
            $drug_class->update();

            Session::flash('success-to-update-drug-class', 'Kelas Obat ' . $drug_class->class_name . ' Berhasil Di Update');

            return redirect(url('/drug/class/' . $drug_class->class_id));
        } catch (ValidationException $error) {
            Session::flash('fail-to-update-drug-class', 'Kelas Obat ' . $drug_class->class_name . ' Tidak Berhasil Di Update');
            return back();
        }
    }

    public function destroyDrugClass(Request $request)
    {

        $drug_class = DrugClass::find($request->class_id);

        if (!$drug_class) {
            Session::flash('error', 'Maaf, data tidak ditemukan dan tidak dapat dihapus');
            return back();
        }

        $drug_class->delete();

        Session::flash('success-to-delete-drug-class', 'Data Kelas Obat ' . $drug_class->class_name . ' berhasil dihapus');

        return redirect(url('/drugs/classes'));
    }
}
