<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('content.countries', compact('countries'));
    }

    public function edit(Request $request)
    {
        $form = $request->validate([
            'country_name' => 'required',
            'country_id' => 'required|exists:countries,id'
        ]);

        $country = Country::find($form['country_id']);
        $country->update(['country_name' => $form['country_name']]);
        return back()->with('success', 'COUNTRY UPDATED!');
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'country_name' => 'required|unique:countries,country_name'
        ]);

        Country::create($form);

        return back()->with('success', 'COUNTRY ADDED!');
    }

    public function destroy(Request $request)
    {
         $form = $request->validate([
            'country_id' => 'required|exists:countries,id',
         ]);

         $country = Country::find($form['country_id']);
        $country->delete();

        return back()->with('success', 'COUNTRY REMOVED!');
    }
}
