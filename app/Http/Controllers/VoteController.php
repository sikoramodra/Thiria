<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddVoteRequest;
use App\Models\Vote;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VoteController extends Controller {
    public function add(AddVoteRequest $request) {
        $data = $request->validated();
        $user_id = Auth::id();
        $creature_id = $data['creature_id'];

        $existingVote = Vote::where('user_id', $user_id)
                            ->where('creature_id', $creature_id)
                            ->first();

        if ($existingVote) {
            $existingVote->update($data);

        } else {
            $data['user_id'] = $user_id;
            $newVote = new Vote($data);
            $newVote->save();
        }
    
        return redirect()->back();
    }

    public function delete(Vote $vote) {
        try {
            Gate::authorize('own', $vote);
        } catch (AuthorizationException $e) {
            abort(403, $e);
        }

        $vote->delete();
        return redirect()->back();
    }
}
