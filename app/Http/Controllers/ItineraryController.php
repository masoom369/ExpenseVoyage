<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Itinerary;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItineraryController extends Controller
{
    public function downloadReport()
{
    // Fetch itineraries related to the authenticated user
    $itineraries = Itinerary::where('user_id', Auth::id())
        ->with('trip') // Assuming you want trip data
        ->get();

    // Generate CSV content
    $csvData = "Itinerary ID,Trip Name,Amount,Trip Date\n";
    foreach ($itineraries as $itinerary) {
        $csvData .= "{$itinerary->id},{$itinerary->trip->name},{$itinerary->amount},{$itinerary->trip_date}\n";
    }

    // Create a response using the response helper
    return response()->stream(function () use ($csvData) {
        echo $csvData;
    }, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="itineraries_report.csv"',
    ]);
}

    public function index() {
        // Fetch itineraries with their related trip
        $itineraries = Itinerary::where('user_id', Auth::id())
                                ->with('trip') // Eager load the trip relationship
                                ->get();

        // Fetch the user's currency
        $userCurrency = Auth::user()->currency;

        // Fetch all destination currencies
        $destinations = Destination::all(); // Or filter by any specific criteria

        return view('itineraries.index', compact('itineraries', 'userCurrency', 'destinations'));
    }

        public function create() {
            // Fetch all trips for the dropdown
            $trips = Trip::where('user_id', Auth::id())->get();
            return view('itineraries.create', compact('trips'));
        }

        public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'trip_date' => 'required|date',
            'amount' => 'required|integer',
            'trip_id' => 'required|exists:trips,id',
        ]);

        // Create the itinerary
        Itinerary::create([
            'trip_date' => $request->trip_date,
            'amount' => $request->amount,
            'trip_id' => $request->trip_id,
            'user_id' => Auth::id(),
        ]);

        // Check if the total itineraries for this trip exceed the budget
        $trip = Trip::with('itineraries')->findOrFail($request->trip_id);
        $totalItineraryAmount = $trip->itineraries->sum('amount');

        if ($totalItineraryAmount > $trip->budget) {
            return redirect()->route('itineraries.index')->with('warning', 'Total itineraries exceed the trip budget.');
        }

        return redirect()->route('itineraries.index');
    }


        public function edit($id) {
            $itinerary = Itinerary::where('id', $id)
                                  ->where('user_id', Auth::id())
                                  ->firstOrFail();
            $trips = Trip::where('user_id', Auth::id())->get();
            return view('itineraries.edit', compact('itinerary', 'trips'));
        }

        public function update(Request $request, $id) {
            // Validate the request data
            $request->validate([
                'trip_date' => 'required|date',
                'amount' => 'required|integer',
                'trip_id' => 'required|exists:trips,id',
            ]);

            $itinerary = Itinerary::where('id', $id)
                                  ->where('user_id', Auth::id())
                                  ->firstOrFail();

            $itinerary->update([
                'trip_date' => $request->trip_date,
                'amount' => $request->amount,
                'trip_id' => $request->trip_id,
            ]);

            return redirect()->route('itineraries.index');
        }

        public function destroy($id) {
            $itinerary = Itinerary::where('id', $id)
                                  ->where('user_id', Auth::id())
                                  ->firstOrFail();

            $itinerary->delete();

            return redirect()->route('itineraries.index');
        }
}
