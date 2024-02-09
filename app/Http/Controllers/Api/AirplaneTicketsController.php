<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AirplaneTicket;
use Illuminate\Http\Request;

class AirplaneTicketsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:subscribers,email',
            'surname'=> 'required|string',
            'phone_number'=> 'required',
            'class'=> 'required',
            'origin'=> 'required',
            'destination'=> 'required',
            'date_of_going'=> 'required',
            'return_date'=> 'required',
            'adults_number'=> 'required',
            'kids_number'=> 'required',
            'babies_number'=> 'required'

        ]);

        $tickets = AirplaneTicket::create($data);

        return response()->json(['message' => 'Ticket sent successfully', 'data' => $tickets], 201);
    }}
