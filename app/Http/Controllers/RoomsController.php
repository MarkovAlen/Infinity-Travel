<?php

namespace App\Http\Controllers;

use Log;
use Exception;
use App\Models\Room;
use App\Models\Accomodation;
use App\Models\DetailedInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function index(){
        $rooms = Room::all();
        $accommodations = Accomodation::all();
        $detailedInfos = DetailedInfo::all();
       return view('/content.rooms',compact('rooms','accommodations','detailedInfos'));
    }
    public function store(Request $request){
      $form = $request->validate([
    'nights_number' => 'required|numeric',
    'total_price' => 'required',
    'price_per_night' => 'required|numeric',
    'available_date' => 'required|date',
    'type_of_room' => 'required',
    'is_reserved' => 'required|boolean',
    'accommodation_id' => 'exists:accommodations,id',
    'room_number'=>'required|unique:rooms,room_number|numeric'
]);
try{
    $detailedInfo = DetailedInfo::where('accommodation_id', $form['accommodation_id'])->first();
    $form['detailed_info_id'] = $detailedInfo->id;
    Room::create($form);
    return back()->with('success', 'Room added successfully!');
 }catch(Exception $e){
    return back()->with('error', 'Failed to add accommodation. ' . $e->getMessage());
 }
}
public function edit(Request $request)
{
    $form = $request->validate([
        'room_number' => 'required',
        'nights_number' => 'required',
        'total_price' => 'required',
        'price_per_night' => 'required',
        'available_date' => 'required|date',
        'type_of_room' => 'required',
        'is_reserved' => 'required|boolean',
    ]);

    try {
        $roomEdit = Room::with(['detailedInfo.accommodation'])->find($form['room_number']);

        if ($roomEdit) {
            $roomEdit->update([
                'nights_number' => $form['nights_number'],
                'total_price' => $form['total_price'],
                'price_per_night' => $form['price_per_night'],
                'available_date' => $form['available_date'],
                'type_of_room' => $form['type_of_room'],
                'is_reserved' => $form['is_reserved'],
            ]);
            return back()->with('success', 'Room updated successfully!');

        } else {
            return back()->with('error', 'Room not found for the provided Room Number.');
        }
    } catch (Exception $e) {
        return back()->with('error', 'Failed to update room. ' . $e->getMessage());
    }
}
public function destroy(Request $request){
    $form = $request->validate([
        'room_number' => 'required',
    ]);
    try {
        $roomDelete = Room::find($form['room_number']);
        if ($roomDelete){
            $roomDelete->delete();
        }
        return back()->with('success', 'Room deleted successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to delete Room. ' . $e->getMessage());
    }
    }
        public function getDetails($id){
            $room = Room::with(['detailedInfo.accommodation'])->find($id);
            return response()->json($room);

        }
}
