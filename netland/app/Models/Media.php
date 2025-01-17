<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'rating',
        'length_in_minutes',
        'released_at',
        'country_of_origin',
        'youtube_trailer_id',
        'summary',
        'spoken_in_language',
        'type', // movie or series
    ];

    // Relatie met Actor (acteurs/actrices)
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'media_actor');
    }
}
