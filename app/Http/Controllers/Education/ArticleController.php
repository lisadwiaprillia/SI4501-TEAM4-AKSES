<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $coverImage = null;
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')->store('cover_images', 'public');
        }

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'cover_image' => $coverImage,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }
}


