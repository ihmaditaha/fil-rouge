<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id','age','is_smoking','is_pets','is_guests',])]
class Profile extends Model
{

    protected function casts(): array
    {
        return [
            'is_smoking' => 'boolean',
            'is_pets' => 'boolean',
            'is_guests' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
