<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReceived;
class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:subscribers,email',
            'message'=> 'required'
        ]);

        $contact = Contact::create($data);
        Mail::to($contact->email)->send(new ContactReceived($contact));
        return response()->json(['message' => 'Subscriber created successfully', 'data' => $contact], 201);
    }
}
