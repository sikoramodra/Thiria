<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddVoteRequest;
use App\Models\Vote;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VoteController extends Controller {
    public function add(AddVoteRequest $request): void {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $newVote = new Vote($data);
        $newVote->save();
    }

    public function delete(Vote $vote): void {
        try {
            Gate::authorize('own', $vote);
        } catch (AuthorizationException $e) {
            abort(403, $e);
        }

        $vote->delete();
    }
}
