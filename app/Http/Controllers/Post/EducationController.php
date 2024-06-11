<?php
namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EducationController extends Controller
{
    public function show_education()
    {
        $posts = Post::with('user', 'categories')->orderBy('created_at')->get();

        foreach ($posts as $post) {
            $post->formatted_date = Carbon::parse($post->created_at)->diffForHumans(null, true);
        }
        return view('Admin.Education.index', [
            'posts' => $posts
        ]);
    }

    public function show_detail_post(Request $request)
        {
            $post = Post::with(['comments' => function($query) {
                $query->whereNull('parent_id')->with('replies');
            }])->findOrFail($request->post_id);

            $post->formatted_date = Carbon::parse($post->created_at)->diffForHumans(null, true);

            $comments = $post->comments;

            return view('Admin.Education.detail-post', [
                'post' => $post,
                'comments' => $comments
            ]);
        }


    public function show_education_create_form()
    {
        $categories = Category::all();
        return view('Admin.Education.create-post', [
            'categories' => $categories
        ]);
    }

    public function store_education_data(Request $request)
    {
        try {
            $validated_post_data = $request->validate([
                'post_title' => 'required|unique:posts',
                'post_body' => 'required',
                'category_id' => 'required'
            ]);

            $post = new Post();
            $post->post_title = $validated_post_data['post_title'];
            $post->post_body = $validated_post_data['post_body'];
            $post->category_id = $validated_post_data['category_id'];
            $post->post_slug = Str::slug($validated_post_data['post_title'], '-');
            $post->user_id = Session::get('user_id');
            $post->save();

            Session::flash('success', 'Data Edukasi ' . $validated_post_data['post_title'] . ' berhasil dibuat');

            return redirect(url('/education'));
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function show_edit_education_form(Request $request)
    {
        $categories = Category::all();
        $post = Post::with('categories')->findOrFail($request->post_id);
        return view('Admin.Education.edit-post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update_post_data(Request $request)
    {
        try {
            $validated_post_data = $request->validate([
                'post_title' => 'required',
                'post_body' => 'required',
                'category_id' => 'required'
            ]);

            $post = Post::findOrFail($request->post_id);
            $post->post_title = $validated_post_data['post_title'];
            $post->post_body = $validated_post_data['post_body'];
            $post->category_id = $validated_post_data['category_id'];
            $post->post_slug = Str::slug($validated_post_data['post_title'], '-');
            $post->update();

            Session::flash('success', 'Data Edukasi ' . $post->post_title . ' Berhasil Diperbaharui');

            return redirect(url('/education'));
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }

    public function delete_post(Request $request)
    {
        try {
            $post = Post::findOrFail($request->post_id);
            $post->delete();

            Session::flash('success', 'Data Edukasi ' . $post->post_title . ' Berhasil Dihapus');
            return back();
        } catch (\Throwable $err) {
            Session::flash('error', $err->getMessage());
            return back();
        }
    }
}


// namespace App\Http\Controllers\Post;

// use App\Http\Controllers\Controller;
// use App\Models\Category;
// use App\Models\Post;
// use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Str;

// class EducationController extends Controller
// {
//     public function show_education()
//     {
//         $posts = Post::with('user', 'categories')->orderBy('created_at')->get();

//         foreach ($posts as $post) {
//             $post->formatted_date = Carbon::parse($post->created_at)->diffForHumans(null, true);
//         }
//         return view('Admin.Education.index', [
//             'posts' => $posts
//         ]);
//     }

//     public function show_detail_post(Request $request)
//     {
//         $post = Post::findOrFail($request->post_id);
//         $post->formatted_date = Carbon::parse($post->created_at)->diffForHumans(null, true);
//         return view('Admin.Education.detail-post', [
//             'post' => $post
//         ]);
//     }

//     public function show_education_create_form()
//     {
//         $categories = Category::all();
//         return view('Admin.Education.create-post', [
//             'categories' => $categories
//         ]);
//     }

//     public function store_education_data(Request $request)
//     {
//         try {
//             $validated_post_data = $request->validate([
//                 'post_title' => 'required|unique:posts',
//                 'post_body' => 'required',
//                 'category_id' => 'required'
//             ]);

//             $post = new Post();
//             $post->post_title = $validated_post_data['post_title'];
//             $post->post_body = $validated_post_data['post_body'];
//             $post->category_id = $validated_post_data['category_id'];
//             $post->post_slug = Str::slug($validated_post_data['post_title'], '-');
//             $post->user_id = Session::get('user_id');
//             $post->save();

//             Session::flash('success', 'Data Edukasi ' . $validated_post_data['post_title'] . ' berhasil dibuat');

//             return redirect(url('/education'));
//         } catch (\Throwable $err) {
//             dd($err->getMessage());
//             Session::flash('error', $err->getMessage());
//             return back();
//         }
//     }

//     public function show_edit_education_form(Request $request)
//     {
//         $categories = Category::all();
//         $post = Post::with('categories')->findOrFail($request->post_id);
//         return view('Admin.Education.edit-post', [
//             'post' => $post,
//             'categories' => $categories
//         ]);
//     }

//     public function update_post_data(Request $request)
//     {

//         try {
//             $validated_post_data = $request->validate([
//                 'post_title' => 'required',
//                 'post_body' => 'required',
//                 'category_id' => 'required'
//             ]);

//             $post = Post::findOrFail($request->post_id);
//             $post->post_title = $validated_post_data['post_title'];
//             $post->post_body = $validated_post_data['post_body'];
//             $post->category_id = $validated_post_data['category_id'];
//             $post->post_slug = Str::slug($validated_post_data['post_title'], '-');
//             $post->update();

//             Session::flash('success', 'Data Edukasi ' . $post->post_title . ' Berhasil Diperbaharui');

//             return redirect(url('/education'));
//         } catch (\Throwable $err) {
//             Session::flash('error', $err->getMessage());
//             return back();
//         }
//     }

//     public function delete_post(Request $request)
//     {
//         try {
//             $post = Post::findOrFail($request->post_id);
//             $post->delete();

//             Session::flash('success', 'Data Edukasi ' . $post->post_title . ' Berhasil Dihapus');
//             return back();
//         } catch (\Throwable $err) {
//             Session::flash('error', $err->getMessage());
//             return back();
//         }
//     }
// }
