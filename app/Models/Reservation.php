<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_room',
        'id_hotel',
        'tanggal_reservasi',
        'name_room',
        'name_hotel',
        'name_user',
        'people_stay',
        'total_credit',
        'total_days',
    ];
}
