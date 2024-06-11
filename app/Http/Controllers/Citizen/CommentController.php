<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $apaaja = $request->validate([
        'username' => 'required|string|max:255',
        'message' => 'required|string',
        'parent_id' => 'nullable|exists:comments,id',
        'post_id' => 'required|exists:posts,post_id',
    ]); 

    $comment = Comment::create($apaaja);

    return redirect()->back()->with('success', 'Comment posted successfully!');
}

public function update(Request $request, Comment $comment)
{
    $request->validate([
        'message' => 'required|string',
    ]);

    $comment->update([
        'message' => $request->message,
    ]);

    return view('Admin.Education.detail-post', ['post_id' => $comment->post_id]);
}

public function destroy(Request $request)
{
    $comment = Comment::findOrFail($request->id);

    $comment->delete();

    return redirect()->back()->with('success', 'Comment delete successfully!');
}
}
