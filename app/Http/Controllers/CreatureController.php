<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Contracts\View\View;

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

    public function view_edit(Creature $creature): View {
        return view('creature.edit', ['creature' => $creature]);
    }
}

//use Illuminate\Support\Facades\Gate;
//try {
//    Gate::authorize('own', $user);
//} catch (AuthorizationException $e) {
//    abort(403, $e);
//}
