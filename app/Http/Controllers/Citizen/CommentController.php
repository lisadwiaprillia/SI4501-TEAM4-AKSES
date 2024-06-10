<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::create([
            'username' => $request->username,
            'message' => $request->message,
            'parent_id' => $request->parent_id,
        ]);

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

        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
