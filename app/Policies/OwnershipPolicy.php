<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Creature;
use App\Models\User;
use App\Models\Vote;

class OwnershipPolicy {
    /**
     * Create a new policy instance.
     */
    public function __construct() {
        //
    }

    public function own(?User $user, Creature|Comment|Vote $item): bool {
        return !is_null($user) && ($user->id === $item->user->id || $user->isAdmin());
    }
}
