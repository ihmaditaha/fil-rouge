<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['announce_id','is_active','number',])]
class Colocation extends Model
{
    protected $table = 'colocation';


    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function announce(): BelongsTo
    {
        return $this->belongsTo(Announce::class);
    }
}
