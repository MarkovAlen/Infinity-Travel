<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
        public function store(Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:subscribers,email',
            ]);
    
            $subscriber = Subscriber::create($data);
    
            return response()->json(['message' => 'Subscriber created successfully', 'data' => $subscriber], 201);
        }

}
