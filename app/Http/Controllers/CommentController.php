<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function add(StoreCommentRequest $request) {
        $data = $request->validated();
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
