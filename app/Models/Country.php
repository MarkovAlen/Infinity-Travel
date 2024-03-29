<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['country_name'];
    protected $table='countries';

    public function region(){
        return $this->hasMany(Region::class);
    }
}
