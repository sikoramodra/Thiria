<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCreatureRequest;
use App\Models\Creature;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class CreatureController extends Controller {
    public function view_list(): View {
        return view('creature.list');
    }

    public function view_show(Creature $creature): View {
        return view('creature.show', ['creature' => $creature]);
    }

    public function view_add(): View {
        return view('creature.add');
    }

    public function add(AddCreatureRequest $request): RedirectResponse {
        $data = $request->validated();

        $newCreature = new Creature($data);
        $newCreature->save();

        return redirect()->route(
            'creature.view_show', ['creature' => $newCreature]
        )->with('success', 'Successfully added');
    }

    public function view_edit(Creature $creature): View {
        return view('creature.edit', ['creature' => $creature]);
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
