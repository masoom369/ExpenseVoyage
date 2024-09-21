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
        $expenses = Expense::where('user_id', Auth::id())
            ->with('trip', 'category')
            ->get();

        $csvData = "Expense ID,Amount,Trip,Category,Note,Date\n";

        foreach ($expenses as $expense) {
            $csvData .= "{$expense->id},"
                . "{$expense->amount},"
                . "{$expense->trip->name},"
                . "{$expense->category->name},"
                . "{$expense->note},"
                . "{$expense->created_at->toDateString()}\n";
        }

        return response()->stream(function () use ($csvData) {
            echo $csvData;
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="expenses_report.csv"',
        ]);
    }

    public function index()
    {
        $currencyPreference = Auth::user()->currency;

        $expenses = Expense::all();
        $users = Auth::user();
        $destinations = Destination::all();

        return view('expenses.index', compact('expenses', 'users', 'destinations', 'currencyPreference'));
    }

    public function create()
    {
        $trips = Trip::all();
        $categories = Category::all();

        return view('expenses.create', compact('trips', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'trip_id' => 'required|exists:trips,id',
            'category_id' => 'required|exists:categories,id',
            'note' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $expense = Expense::create($validated);
        $this->checkBudget($expense->trip_id);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $trips = Trip::all();
        $categories = Category::all();

        return view('expenses.edit', compact('expense', 'trips', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'trip_id' => 'required|exists:trips,id',
            'category_id' => 'required|exists:categories,id',
            'note' => 'required|string|max:255',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($validated);
        $this->checkBudget($expense->trip_id);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }

    private function checkBudget($tripId)
    {
        $totalExpenses = Expense::where('trip_id', $tripId)->sum('amount');
        $trip = Trip::find($tripId);

        if ($totalExpenses > $trip->budget) {
            session()->flash('budgetExceeded', 'The total expenses for this trip have exceeded the budget.');
        }
    }
}
