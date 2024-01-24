<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request) {
        $data = $request->validated();
        
        $data['publication_id'] = $request->input('publication_id');
        $data['parent_id'] = $request->input('parent_id');
        $data['author_id'] = Auth::id();

        $newComment = new Comment($data);
        $newComment->save();
        return redirect()->back();
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect()->back();
    }
}
