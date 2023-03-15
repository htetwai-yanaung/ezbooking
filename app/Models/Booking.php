<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function room(){
        return $this->hasOne(Room::class, 'id', 'room_id');
    }
}
