<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedInfo extends Model
{
    use HasFactory;
    protected $table = 'detailed_infos';
    protected $fillable = ['transport', 'description', 'accommodation_id'];

    public function accommodation()
    {
        return $this->belongsTo(Accomodation::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
