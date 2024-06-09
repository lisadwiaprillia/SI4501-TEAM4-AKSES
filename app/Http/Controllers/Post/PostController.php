<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Carbon\Carbon;

class PostController extends Controller
{
    public function educationIndex()
    {
        $posts = Post::with('user')->get();
        return view('admin.education.post', compact('posts'));
    }

    public function detailPost(Request $request)
    {
        $post = Post::with('user')->find($request->post_id);
        return view('admin.education.detail-post')->with(compact('post'));
    }

    public function addPost()
    {
        $Categories = Category::all();
        return view('admin.education.add-post', compact('Categories'));
    }

    public function storePost(Request $request)
    {
        try {
            $request->validate([
                'post_title' => 'required|unique:posts,post_title',
                'post_slug' => 'required',
                'post_body' => 'required',
                'category_id' => 'required',
                'user_id' => 'required'
            ]);
    
            $post = new Post;
            $post->post_title = $request->input('post_title');
            $post->post_slug = $request->input('post_slug');
            $post->post_body = $request->input('post_body');
            $post->category_id = $request->input('category_id');
            $post->user_id = $request->input('user_id');
    
            $post->save();
    
            // Tampilkan SweetAlert2 popup
            $response = [
                'status' => 'success',
                'message' => 'Data Postingan ' . $post->post_title . ' Berhasil Disimpan'
            ];
    
            // Berikan respons JSON
            // return response()->json($response);

            return redirect(url('/posts'));
    
        } catch (\Throwable $err) {
            dd($err);
        }
    }

    public function editPost(Request $request)
    {
        $post = Post::with('user')->find($request->post_id);
        $Categories = Category::all(); // Mengambil semua kategori dari database, sesuaikan dengan model dan kondisi Anda
        return view('admin.education.edit-post')->with(compact('post', 'Categories'));
    }

    public function updatePost(Request $request, $post_id)
    {
        /////////////////////// TRY /////////////////////////
        $post = Post::findOrFail($request->post_id);
        $post->post_title = $request->post_title;
        $post->post_slug = $request->post_slug;
        $post->post_body = $request->post_body;
        $post->category_id = $request->category_id;
        $post->update();

        session()->flash('postUpdate', 'Data Postingan Berhasil Di Perbaharui');

        return redirect(route('educational'));

    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->delete();

        session()->flash('postDeleted', 'Data Postingan Berhasil Di Hapus');

        return redirect(url('/education'));
    }

    // * Customer Section

    public function customerIndex()
    {
        $posts = Post::all();
        return view('customer.education-page')->with(compact('posts'));
    }

    public function educationDetail(Request $request)
    {
        $post = Post::with('employee')->find($request->post_id);
        $uploadDate = Carbon::parse($post->created_at)->format('d F Y');
        return view('customer.education-detail')->with(compact(['post', 'uploadDate']));
    }
}
