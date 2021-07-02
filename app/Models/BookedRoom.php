<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedRoom extends Model
{
    use HasFactory;
    protected $guarded = [];

    // pending, approved, cancel
    public function room_status_text($status)
    {
        $result = '';
        if ($status == 'pending') {
            $result = '<b class="text-warning">Pending</b>';
        }
        if ($status == 'approved') {
            $result = '<b class="text-success">Approved</b>';
        }
        if ($status == 'cancel') {
            $result = '<b class="text-danger">Cancel</b>';
        }

        return $result;
    }

    // Canceld by text // customer, receptionist
    public function room_status_canceled_by_text($canceled_by)
    {
        $result = '';
        if ($canceled_by == 'customer') {
            $result = '<b class="text-danger">You canceled this reservation</b>';
        }
        if ($canceled_by == 'receptionist') {
            $result = '<b class="text-danger">Your reservation is canceled by our staff memeber(receptionist)</b>';
        }


        return $result;
    }


    /**
     * Get the user that owns the BookedRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Get the room that owns the BookedRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
