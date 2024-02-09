<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTicket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(){
        $tickets= AirplaneTicket::all();
        return view('/content.tickets',compact('tickets'));

    }
}
