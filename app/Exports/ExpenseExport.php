<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpenseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Expense::where('user_id', Auth::id())
        ->with('trip') // Eager load the trip relationship
        ->get();
    }
}
