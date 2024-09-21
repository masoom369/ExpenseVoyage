@extends('layouts.user_dashboard')

@section('content')
    <h1>Expenses</h1>
    <a href="{{ route('expenses.downloadReport') }}" class="btn btn-info">Download Report</a>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add New Expense</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('budgetExceeded'))
        <div class="alert alert-warning">
            {{ session('budgetExceeded') }}
        </div>
    @endif

    <div class="mb-3">
        <select class="userCurrency">
            <option value="{{ Auth::user()->currency }}" selected>
                {{ Auth::user()->currency }} (Your Preferred Currency)
            </option>
        </select>

        <select class="destinationCurrency" placeholder="Select Destination Currency">
            <option value="">Select Destination Currency</option>
            @foreach ($destinations as $destination)
                <option value="{{ $destination->currency }}">{{ $destination->name }} ({{ $destination->currency }})
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary convert">Convert</button>
    </div>
    <input type="text" id="expenseSearch" placeholder="Search Expenses" class="form-control mb-3">

    <table class="table">
        <thead>
            <tr>
                <th>Trip</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Converted Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="expenseTable">
            @foreach ($expenses as $expense)
                <tr data-amount="{{ $expense->amount }}">
                    <td>{{ $expense->trip->name }}</td>
                    <td>{{ $expense->category->name }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td class="converted-amount"></td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#expenseSearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#expenseTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
            $(".convert").on("click", function() {
                let userCurrency = $(".userCurrency").val();
                let destinationCurrency = $(".destinationCurrency").val();

                if (!destinationCurrency) {
                    alert("Please select a destination currency.");
                    return;
                }

                const api = `https://api.exchangerate-api.com/v4/latest/${destinationCurrency}`;

                fetch(api)
                    .then(response => response.json())
                    .then(data => {
                        if (data.rates[userCurrency]) {
                            let conversionRate = data.rates[userCurrency];

                            $('#expenseTable tr').each(function() {
                                let amount = $(this).data('amount');
                                let convertedAmount = (amount * conversionRate).toFixed(2);
                                $(this).find('.converted-amount').text(
                                    `${convertedAmount} ${userCurrency}`);
                            });
                        } else {
                            alert("User currency not found in exchange rates.");
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching data:", error);
                        alert(
                        "There was an error fetching the exchange rates. Please try again later.");
                    });
            });
        });
    </script>
@endsection
