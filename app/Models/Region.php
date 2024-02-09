<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['region_name', 'country_id'];

    public function country(){
    return $this->belongsTo(Country::class);
    }

    public function accomodation(){
        return $this->hasMany(Accomodation::class);
    }
}
