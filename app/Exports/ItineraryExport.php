<?php

namespace App\Exports;

use App\Models\Itinerary;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItineraryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Itinerary::where('user_id', Auth::id())
        ->with('trip') // Eager load the trip relationship
        ->get();
    }
}
