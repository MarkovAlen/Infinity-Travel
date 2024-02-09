<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index(){
        $regions = Region::all();
        $countries = Country::all();
        return view('content.regions',compact('regions','countries'));
    }
    public function store(Request $request){
       
        $form = $request->validate([
            'region_name' => 'required|unique:regions,region_name',
            'country_id' => 'required|exists:countries,id'
        ]);
        
        Region::create($form);

        return back()->with('success', 'REGION ADDED!');
    }
    public function edit(Request $request){
        $form=$request->validate([
            'region_name'=>'required',
            'region_id'=>'required|exists:regions,id'
        ]);
        $region = Region::find($form['region_id']);
        $region->update(['region_name'=>$form['region_name']]);
        return back()->with('success', 'REGION UPDATED!');
    }
    public function destroy(Request $request){
        $form=$request->validate([
            'region_id'=>'required|exists:regions,id'
        ]);
        $region = Region::find($form['region_id']);
        $region->delete();
        return back()->with('success', 'REGION DELETED!');
    }
}
