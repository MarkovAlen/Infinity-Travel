<?php

namespace App\Http\Controllers\Api;

use App\Models\Accomodation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\AccommodationResource;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accomodation::with([
            'region.country',
            'rating',
            'detailedInfo',
            'rooms',
            'gallery',
        ])->get();
        
        return [
            'accommodations' => AccommodationResource::collection($accommodations)
        ];
    }
}
