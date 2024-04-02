<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller {
    public function add(AddCommentRequest $request): void {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $newComment = new Comment($data);
        $newComment->save();
    }

    public function delete(Comment $comment): void {
        try {
            Gate::authorize('own', $comment);
        } catch (AuthorizationException $e) {
            abort(403, $e);
        }

        $comment->delete();
    }
}
