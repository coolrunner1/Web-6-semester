<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request) {
        Comment::create([
            'blog_id' => $request->route('id'),
            'author' => Auth::user()->name,
            'body' => $request->getContent(),
        ]);
        return response()->json(['status' => 'success', 'message' => 'Comment added successfully.'], 200);
    }

    public function getCommentsByBlogPostId(Request $request) {
        $comments = Comment::where('blog_id', $request->route('id'))->orderBy('created_at', 'desc')->get();
        $htmlComments = "";

        foreach ($comments as $comment) {
            $htmlComments = $htmlComments.
                "<div class='blog-container'>
                     <div class='blog-author'>{$comment->author} написал:</div>
                     <div class='review-header'>{$comment->created_at}</div>
                     <div class='blog-body'>{$comment->body}</div>
                 </div>";
        }

        return response()->json(['status' => 'success', 'data' => $htmlComments], 200);
    }
}
