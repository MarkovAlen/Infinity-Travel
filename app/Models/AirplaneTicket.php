<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirplaneTicket extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','surname','phone_number','class','origin','destination','date_of_going','return_date','adults_number','kids_number','babies_number'];
    protected $table='airplane_tickets';
}
