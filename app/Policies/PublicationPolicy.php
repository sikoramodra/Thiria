<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicationPolicy
{

    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */

    public function update(?User $user, Publication $publication): bool
    {
        if($user!==NULL){
            if(Auth::id()===$publication->author_id){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
