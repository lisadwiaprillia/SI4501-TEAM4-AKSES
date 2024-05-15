<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class CategoriesController extends Controller
{

    public function showCategoryForm()
    {
        $categories = Category::all(); // Assuming 'Category' is your category model
        return view('Category.showCategory', compact('categories'));
    }

    public function storeCategoryData(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories,category_name',
                'description' => 'required',
            ]);
    
            $category = new Category;
            $category->category_name = $request->input('name');
            $category->category_desc = $request->input('description');
            $category->save();
    
            // Tampilkan SweetAlert2 popup
            $response = [
                'status' => 'success',
                'message' => 'Data Kategori ' . $category->category_name . ' berhasil disimpan'
            ];
    
            return response()->json($response); // Berikan respons JSON
    
        } catch (\Throwable $err) {
            dd($err);
        }
    }
    

    public function showEditCategoryForm($id)
    {
        $category = Category::find($id);
        return view('Category.editCategories', compact('categories'));
    }  

    public function listCategories()
    {
        $categories = Category::all();
        return view('Category.listCategories', compact('categories'));
    }

    public function editCategoryForm($id)
    {
        $category = Category::findOrFail($id);
        return view('Category.editCategories', compact('category'));
    }

    public function updateCategoryData(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories,category_name,' . $id . ',category_id',
                'description' => 'required',
            ]);

            $category = Category::findOrFail($id);
            $category->category_name = $request->input('name');
            $category->category_desc = $request->input('description');
            $category->save();

            Session::flash('success-to-update-category', 'Data Kategori ' . $category->category_name . ' Berhasil Diperbarui');

            return redirect(url('/list/categories'));
        } catch (\Throwable $err) {
            dd($err);
        }
    }
    public function deleteCategory($id)
{
    try {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menghapus kategori'], 500);
    }
}

}
