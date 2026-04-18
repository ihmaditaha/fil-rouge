<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    public function view(User $user, User $model): bool
    {
        return $user->id === $model->id || $user->isLandlord();
    }

    public function edit(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    public function delete(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }
}
