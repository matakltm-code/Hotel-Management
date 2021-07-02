<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the booked_rooms for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function booked_rooms()
    {
        return $this->hasMany(BookedRoom::class, 'room_id', 'id');
    }
}
