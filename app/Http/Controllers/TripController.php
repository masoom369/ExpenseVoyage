<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::where('user_id', Auth::id())->get();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('trips.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'budget' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'destination_id' => 'required|exists:destinations,id',
        ]);

        Trip::create([
            'name' => $request->name,
            'budget' => $request->budget,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'destination_id' => $request->destination_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('trips.index');
    }

    public function edit($id)
    {
        $trip = Trip::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $destinations = Destination::all();
        return view('trips.edit', compact('trip', 'destinations'));
    }

    public function show($id)
    {
        $trip = Trip::with(['expenses', 'itineraries'])->findOrFail($id);
        $totalExpenses = $trip->expenses->sum('amount');
        $budgetExceeded = $totalExpenses > $trip->budget;

        return view('trips.show', compact('trip', 'totalExpenses', 'budgetExceeded'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'budget' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'destination_id' => 'required|exists:destinations,id',
        ]);

        $trip = Trip::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $trip->update([
            'name' => $request->name,
            'budget' => $request->budget,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'destination_id' => $request->destination_id,
        ]);

        return redirect()->route('trips.index');
    }

    public function destroy($id)
    {
        $trip = Trip::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $trip->delete();

        return redirect()->route('trips.index');
    }
}
