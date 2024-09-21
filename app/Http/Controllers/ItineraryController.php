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
        $itineraries = Itinerary::where('user_id', Auth::id())
            ->with('trip')
            ->get();

        $csvData = "Itinerary ID,Trip Name,Amount,Trip Date\n";
        foreach ($itineraries as $itinerary) {
            $csvData .= "{$itinerary->id},{$itinerary->trip->name},{$itinerary->amount},{$itinerary->trip_date}\n";
        }

        return response()->stream(function () use ($csvData) {
            echo $csvData;
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="itineraries_report.csv"',
        ]);
    }

    public function index()
    {
        $itineraries = Itinerary::where('user_id', Auth::id())
            ->with('trip')
            ->get();

        $userCurrency = Auth::user()->currency;
        $destinations = Destination::all();

        return view('itineraries.index', compact('itineraries', 'userCurrency', 'destinations'));
    }

    public function create()
    {
        $trips = Trip::where('user_id', Auth::id())->get();
        return view('itineraries.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_date' => 'required|date',
            'amount' => 'required|integer',
            'trip_id' => 'required|exists:trips,id',
        ]);

        Itinerary::create([
            'trip_date' => $request->trip_date,
            'amount' => $request->amount,
            'trip_id' => $request->trip_id,
            'user_id' => Auth::id(),
        ]);

        $trip = Trip::with('itineraries')->findOrFail($request->trip_id);
        $totalItineraryAmount = $trip->itineraries->sum('amount');

        if ($totalItineraryAmount > $trip->budget) {
            return redirect()->route('itineraries.index')->with('warning', 'Total itineraries exceed the trip budget.');
        }

        return redirect()->route('itineraries.index');
    }

    public function edit($id)
    {
        $itinerary = Itinerary::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $trips = Trip::where('user_id', Auth::id())->get();
        return view('itineraries.edit', compact('itinerary', 'trips'));
    }

    public function update(Request $request, $id)
    {
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

    public function destroy($id)
    {
        $itinerary = Itinerary::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $itinerary->delete();

        return redirect()->route('itineraries.index');
    }
}
