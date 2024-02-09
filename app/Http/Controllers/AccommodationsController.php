<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Rating;
use App\Models\Region;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Accomodation;
use App\Models\DetailedInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccommodationsController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $regions = Region::all();
        $accommodations = Accomodation::all();
        $ratings = Rating::all();
        $galleries = Gallery::all();
        return view('/content.accommodations', compact('countries', 'regions', 'accommodations', 'ratings', 'galleries'));
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'main_image' => 'required',
            'additional_information' => 'required',
            'is_last_minute' => 'required|boolean',
            'name' => 'required|unique:accommodations,name',
            'rating_id' => 'required|exists:ratings,id',
            'region_id' => 'required|exists:regions,id',
            'image_path_1' => 'required',
            'image_path_2' => 'required',
            'image_path_3' => 'required',
            'image_path_4' => 'required',
            'image_path_5' => 'required',
            'description' => 'required',
            'transport' => 'required',
            'accommodation_id' => 'exists:accommodations,id',
        ]);

        try {
            DB::beginTransaction();
            $accommodation = Accomodation::create($form);
            $form['accommodation_id'] = $accommodation->id;
            $detailedinfo = DetailedInfo::create($form);
            $form['detailed_info_id'] = $detailedinfo->id;
            Gallery::create($form);

            DB::commit();

            return back()->with('success', 'Accommodation added successfully!');
        } catch (Exception $e) {
            DB::rollback();

            return back()->with('error', 'Failed to add accommodation. ' . $e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $form = $request->validate([
            'main_image' => 'required',
            'additional_information' => 'required',
            'is_last_minute' => 'required|boolean',
            'name' => 'required',
            'rating_id' => 'required|exists:ratings,id',
            'image_path_1' => 'required',
            'image_path_2' => 'required',
            'image_path_3' => 'required',
            'image_path_4' => 'required',
            'image_path_5' => 'required',
            'description' => 'required',
            'transport' => 'required',
            'accommodation_id' => 'exists:accommodations,id',
        ]);

        $accommodationEdit = Accomodation::find($form['accommodation_id']);

        try {
            if ($accommodationEdit) {
                $accommodationEdit->update([
                    'main_image' => $form['main_image'],
                    'additional_information' => $form['additional_information'],
                    'is_last_minute' => $form['is_last_minute'],
                    'name' => $form['name'],
                    'rating_id' => $form['rating_id'],
                ]);

                $detailedinfoEdit = DetailedInfo::where('accommodation_id', $accommodationEdit->id)->firstOrNew();
                $detailedinfoEdit->update([
                    'description' => $form['description'],
                    'transport' => $form['transport'],
                ]);

                $galleryEdit = Gallery::where('detailed_info_id', $detailedinfoEdit->id)->firstOrNew();
                $galleryEdit->update([
                    'image_path_1' => $form['image_path_1'],
                    'image_path_2' => $form['image_path_2'],
                    'image_path_3' => $form['image_path_3'],
                    'image_path_4' => $form['image_path_4'],
                    'image_path_5' => $form['image_path_5'],
                ]);

                return back()->with('success', 'Accommodation updated successfully!');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Failed to add accommodation. ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $form = $request->validate([
            'accommodation_id' => 'exists:accommodations,id'
        ]);

        $accommodationDelete = Accomodation::find($form['accommodation_id']);
        if (!$accommodationDelete) {
            return back()->with('error', 'Accommodation not found.');
        }

        try {
            $detailedInfo = $accommodationDelete->detailedInfo;

            if ($detailedInfo) {
                $detailedInfo->gallery()->delete();
                $detailedInfo->delete();
            }

            $accommodationDelete->delete();

            return back()->with('success', 'Accommodation deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete accommodation. ' . $e->getMessage());
        }
    }
    public function getDetails($id)
{
    $accommodation = Accomodation::find($id);
    if (!$accommodation) {
        return response()->json(['error' => 'Accommodation not found.'], 404);
    }
    $detailedInfo = DetailedInfo::where('accommodation_id', $accommodation->id)->firstOrNew();
    $gallery = Gallery::where('detailed_info_id', $detailedInfo->id)->firstOrNew();
    $response = [
        'accommodation' => $accommodation,
        'detailed_info' => $detailedInfo,
        'gallery' => $gallery,
    ];
    return response()->json($response);
}


}
