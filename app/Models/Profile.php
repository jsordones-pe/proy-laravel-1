<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    public function user() : BelongsTo{
        return $this->belongsTo(User::class)->withDefault([
            'bio' => __('This user has not provided a bio yet.')
        ]);
    }
}
