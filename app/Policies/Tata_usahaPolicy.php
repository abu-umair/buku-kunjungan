<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tata_usaha;
use Illuminate\Auth\Access\HandlesAuthorization;

class Tata_usahaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_tata::usaha');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tata_usaha $tataUsaha): bool
    {
        return $user->can('view_tata::usaha');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_tata::usaha');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tata_usaha $tataUsaha): bool
    {
        return $user->can('update_tata::usaha');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tata_usaha $tataUsaha): bool
    {
        return $user->can('delete_tata::usaha');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_tata::usaha');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Tata_usaha $tataUsaha): bool
    {
        return $user->can('force_delete_tata::usaha');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_tata::usaha');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Tata_usaha $tataUsaha): bool
    {
        return $user->can('restore_tata::usaha');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_tata::usaha');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Tata_usaha $tataUsaha): bool
    {
        return $user->can('replicate_tata::usaha');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_tata::usaha');
    }
}
