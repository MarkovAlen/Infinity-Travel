<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table='galleries';
     protected $fillable = ['image_path_1','image_path_2','image_path_3','image_path_4','image_path_5','detailed_info_id'];
    public function detailedInfo(){
        return $this->belongsTo(DetailedInfo::class);
    }
}
