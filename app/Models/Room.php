<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable = [
        'nights_number',
        'total_price',
        'price_per_night',
        'available_date',
        'type_of_room',
        'is_reserved',
        'detailed_info_id',
        'room_number' ,
        
    ];
    public function detailedInfo(){
        return $this->belongsTo(DetailedInfo::class);
    }
    
}
