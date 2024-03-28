<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Contracts\View\View;

class CreatureController extends Controller {
    public function view_list(): View {
        return view('creature.list');
    }

    public function view_show(Creature $creature): View {
        return view('creature.show');
    }

    public function view_add(): View {
        return view('creature.add');
    }

    public function view_edit(Creature $creature): View {
        return view('creature.edit');
    }
}
