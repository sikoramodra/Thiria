<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCreatureRequest;
use App\Models\Creature;
use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CreatureController extends Controller {
    public function view_list(): View {
        $creatures=Creature::all();
        $votes = Vote::all();

        return view('creature.list', ['creatures' => $creatures]);
    }

    public function view_show(Creature $creature): View {
        $comments = Comment::withTrashed()->where('creature_id', $creature->id)->get();
        $upvotes = Vote::where('creature_id', $creature->id)->where('vote', 'upvote')->count();
        $downvotes = Vote::where('creature_id', $creature->id)->where('vote', 'downvote')->count();

        $uservote = Vote::where('creature_id', $creature->id)
                    ->where('user_id', Auth::id())
                    ->first();

        $vote_type = $vote_type = $uservote ? $uservote->vote : null;

        return view('creature.show', ['creature' => $creature,
                                    'comments'=>$comments,
                                    'upvotes'=>$upvotes,
                                    'downvotes'=>$downvotes,
                                    'uservote'=>$uservote,
                                    'vote_type'=>$vote_type]);
    }

    public function view_add(): View {
        return view('creature.add');
    }

    public function add(AddCreatureRequest $request): RedirectResponse {
        $data = $request->validated();
        $data['user_id'] = Auth::id();


        $newCreature = new Creature($data);
        $newCreature->save();

        return redirect()->route(
            'creature.view_show', ['creature' => $newCreature]
        )->with('success', 'Successfully added');
    }

    public function view_edit(Creature $creature): View {
        return view('creature.add', ['creature' => $creature]);
    }

    public function edit(
        AddCreatureRequest $request,
        Creature           $creature
    ): RedirectResponse {
        try {
            Gate::authorize('own', $creature);
        } catch (AuthorizationException $e) {
            abort(403, $e);
        }

        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $creature->fill($data);
        $creature->save();

        return redirect()->route(
            'creature.view_show', ['creature' => $creature]
        )->with('success', 'Successfully updated');
    }

    public function delete(Creature $creature): RedirectResponse {
        try {
            Gate::authorize('own', $creature);
        } catch (AuthorizationException $e) {
            abort(403, $e);
        }

        $creature->delete();

        return redirect()->route(
            'creature.view_list'
        )->with('success', 'Successfully deleted');
    }
}
