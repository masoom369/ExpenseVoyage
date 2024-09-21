<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Exports\ExpenseExport;
use App\Exports\ItineraryExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return view('admin.dashboard');
            } else if ($role == 'user') {
                return view('user.dashboard');
            }
        }
        return redirect()->route('login');
    }

    public function destination()
    {
        $destinations = Destination::all();
        return view('ExpenseVoyage.index', compact('destinations'));
    }

    public function expenses_database()
    {
        return Excel::download(new ExpenseExport, 'ExpenseExport.csv');
    }

    public function itinerary_database()
    {
        return Excel::download(new ItineraryExport, 'ItineraryExport.csv');
    }
}
