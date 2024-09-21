<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function downloadReport()
    {
        // Fetch expenses related to the authenticated user, including trip and category relationships
        $expenses = Expense::where('user_id', Auth::id())
            ->with('trip', 'category') // Ensure trip and category relationships exist
            ->get();

        // CSV header
        $csvData = "Expense ID,Amount,Trip,Category,Note,Date\n";

        // Loop through expenses to generate the CSV rows
        foreach ($expenses as $expense) {
            $csvData .= "{$expense->id},"
                      . "{$expense->amount},"
                      . "{$expense->trip->name},"
                      . "{$expense->category->name},"
                      . "{$expense->note},"
                      . "{$expense->created_at->toDateString()}\n"; // Use the actual expense date
        }

        // Create the response using Laravel's response helper
        return response()->stream(function () use ($csvData) {
            echo $csvData;
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="expenses_report.csv"',
        ]);
    }

    public function index() {
        // Fetch the current user's currency preference
        $currencyPreference = Auth::user()->currency;

        // Fetch all expenses and destinations
        $expenses = Expense::all();
        $users = Auth::user(); // Fetch the current user
        $destinations = Destination::all(); // Fetch all destinations

        return view('expenses.index', compact('expenses', 'users', 'destinations', 'currencyPreference'));
    }

    public function create()
    {
        $trips = Trip::all(); // Fetch all trips
        $categories = Category::all(); // Fetch all categories

        return view('expenses.create', compact('trips', 'categories'));
    }

    public function store(Request $request)
    {
        // Validate the request input
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'trip_id' => 'required|exists:trips,id',
            'category_id' => 'required|exists:categories,id',
            'note' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', // Ensure user_id exists
        ]);

        // Create the expense
        $expense = Expense::create($validated);

        // Check if the budget for the trip is exceeded
        $this->checkBudget($expense->trip_id);

        // Redirect back to expenses with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id); // Find expense by ID
        $trips = Trip::all(); // Fetch all trips
        $categories = Category::all(); // Fetch all categories

        return view('expenses.edit', compact('expense', 'trips', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request input
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'trip_id' => 'required|exists:trips,id',
            'category_id' => 'required|exists:categories,id',
            'note' => 'required|string|max:255',
        ]);

        // Update the existing expense
        $expense = Expense::findOrFail($id);
        $expense->update($validated);

        // Check if the budget for the trip is exceeded
        $this->checkBudget($expense->trip_id);

        // Redirect back to expenses with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id); // Find expense by ID and delete it
        $expense->delete();

        // Redirect back to expenses with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }

    // Private function to check if total expenses exceed the trip budget
    private function checkBudget($tripId)
    {
        $totalExpenses = Expense::where('trip_id', $tripId)->sum('amount'); // Sum the total expenses for the trip
        $trip = Trip::find($tripId); // Find the trip by ID

        if ($totalExpenses > $trip->budget) {
            // Flash a budget exceeded warning if expenses exceed the budget
            session()->flash('budgetExceeded', 'The total expenses for this trip have exceeded the budget.');
        }
    }
}
