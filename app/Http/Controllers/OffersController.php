<?php

namespace App\Http\Controllers;
use App\Models\Offers;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OfferSend;

class OffersController extends Controller
{
    public function index(){
        $offers = Offers::all();
        return view('content.offers', compact('offers'));
    }
    public function store(Request $request){
        $form= $request->validate([
            'offer'=>'required',
            'title'=>'required'
        ]);
       $offer= Offers::create($form);
        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new OfferSend($offer));
        }
        return back()->with('success', 'OFFER SENT!');

    }
//     public function resend(Request $request)
// {
//     $request->validate([
//         'selected_offer' => 'required|exists:offers,id',
//     ]);

//     $offer = Offers::find($request->input('selected_offer'));
//     $subscribers = Subscriber::all();

//     foreach ($subscribers as $subscriber) {
//         Mail::to($subscriber->email)->send(new OfferSend($offer));
//     }

//     return back()->with('success', 'OFFER RESENT!');
// }
}
