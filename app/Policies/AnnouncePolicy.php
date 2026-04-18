<?php

namespace App\Policies;

use App\Models\Announce;
use App\Models\User;

class AnnouncePolicy
{
    public function before(User $user): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    public function view(User $user, Announce $announce): bool
    {
        if ($announce->status === 'approved') {
            return true;
        }

        return $announce->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->isLandlord() || $user->isStudent();
    }

    public function update(User $user, Announce $announce): bool
    {
        if ($announce->status === 'approved' || $announce->status === 'rejected') {
            return false;
        }

        return $announce->user_id === $user->id;
    }

    public function delete(User $user, Announce $announce): bool
    {
        return $announce->user_id === $user->id;
    }

    public function archive(User $user, Announce $announce): bool
    {
        return $announce->user_id === $user->id || $user->isAdmin();
    }

    public function approve(User $user, Announce $announce): bool
    {
        return $user->isAdmin() && $announce->status === 'pending';
    }

    public function reject(User $user, Announce $announce): bool
    {
        return $user->isAdmin() && $announce->status === 'pending';
    }
}
