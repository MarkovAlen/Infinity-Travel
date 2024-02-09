<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;
    protected $table = 'accommodations';
    protected $fillable = ['name', 'main_image', 'additional_information', 'is_last_minute', 'region_id', 'rating_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }

    public function detailedInfo()
    {
        return $this->hasOne(DetailedInfo::class, 'accommodation_id');
    }
    public function rooms()
    {
        return $this->hasManyThrough(Room::class, DetailedInfo::class, 'accommodation_id', 'detailed_info_id');
    }
    public function gallery()
    {
        return $this->hasOneThrough(Gallery::class, DetailedInfo::class, 'accommodation_id', 'detailed_info_id');
    }
}
