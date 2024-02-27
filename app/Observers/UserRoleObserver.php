<?php

namespace App\Observers;

use Spatie\Permission\Models\Role;

use App\Models\User;

class UserRoleObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $role = Role::where('name', 'userClient')->first();
        $user->assignRole($role);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
