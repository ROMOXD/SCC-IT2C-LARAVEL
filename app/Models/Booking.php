<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_firstname',
        'guest_middlename',
        'guest_lastname',
        'guest_email',
        'guest_type_id',
        'room_id',
        'room_type_id',
        'booking_status_id',
    ];

    public function guestType(){
        return $this->belongsTo(GuestType::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }

    public function bookingStatus(){
        return $this->belongsTo(BookingStatus::class);
    }
}
