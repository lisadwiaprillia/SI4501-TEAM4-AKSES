<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function show_categories()
    {
        $categories = Category::orderBy('created_at')->get();
        return view('Category.index', [
            'categories' => $categories
        ]);
    }

    public function delete_category(Request $request)
    {
        try {
            $category = Category::findOrFail($request->category_id);
            $category->delete();

            Session::flash('success', 'Data Kategori' . $category->category_name . ' Berhasil Dihapus');
            return back();
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function show_category_form()
    {
        return view('Category.create-category');
    }

    public function store_category_data(Request $request)
    {
        try {
            $validated_categories_data = $request->validate([
                'category_name' => 'required',
                'category_desc' => 'required'
            ]);

            $created_category = Category::create($validated_categories_data);

            Session::flash('success', 'Data Kategori ' . $created_category->category_name . ' Berhasil dibuat');

            return redirect(url('/categories'));
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function show_edit_category_form(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        return view('Category.category-edit', ['category' => $category]);
    }

    public function update_category(Request $request)
    {
        try {

            $validated_categories_data = $request->validate([
                'category_name' => 'required',
                'category_desc' => 'required'
            ]);

            $category = Category::findOrFail($request->category_id);
            $category->update($validated_categories_data);

            Session::flash('success', 'Data Kategori ' . $category->category_name . ' Berhasil Diubah');

            return redirect(url('/categories'));
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function show_detail_category(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        return view('Category.detail-category', [
            'category' => $category
        ]);
    }
}
