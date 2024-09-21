<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\DestinationController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/', function () {
//     return view('ExpenseVoyage.index');
// });
Route::get('/contact', function () {
    return view('ExpenseVoyage.contact');
});
Route::get('/about', function () {
    return view('ExpenseVoyage.about');
});

Route::get('/', [HomeController::class, 'destination']);
Route::get('/home', [HomeController::class, 'home']);


//trips

Route::get('/trips', [TripController::class, 'index'])->name('trips.index')->middleware('user');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create')->middleware('user');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store')->middleware('user');
Route::get('/trips/{id}/edit', [TripController::class, 'edit'])->name('trips.edit')->middleware('user');
Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update')->middleware('user');
Route::delete('/trips/{id}', [TripController::class, 'destroy'])->name('trips.destroy')->middleware('user');

//category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('user');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('user');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('user');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('user');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware('user');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('user');

//itenary
Route::get('/itineraries', [ItineraryController::class, 'index'])->name('itineraries.index')->middleware('user');
Route::get('/itineraries/create', [ItineraryController::class, 'create'])->name('itineraries.create')->middleware('user');
Route::post('/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store')->middleware('user');
Route::get('/itineraries/{id}/edit', [ItineraryController::class, 'edit'])->name('itineraries.edit')->middleware('user');
Route::put('/itineraries/{id}', [ItineraryController::class, 'update'])->name('itineraries.update')->middleware('user');
Route::delete('/itineraries/{id}', [ItineraryController::class, 'destroy'])->name('itineraries.destroy')->middleware('user');
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index')->middleware('user');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create')->middleware('user');

Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store')->middleware('user');
Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show')->middleware('user');
Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit')->middleware('user');
Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update')->middleware('user');
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy')->middleware('user');


Route::get('/destinations', [DestinationController::class, 'read'])->name('destinations.index')->middleware('admin');
Route::get('/destinations/create', [DestinationController::class, 'create'])->name('destinations.create')->middleware('admin');
Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store')->middleware('admin');
Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('destinations.edit')->middleware('admin');
Route::put('/destinations/{id}', [DestinationController::class, 'update'])->name('destinations.update')->middleware('admin');
Route::delete('/destinations/{id}', [DestinationController::class, 'destroy'])->name('destinations.destroy')->middleware('admin');


Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store')->middleware('admin');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact.index')->middleware('admin');

Route::get('/expenses_database',[HomeController::class,'expenses_database'])->name('expenses_database')->middleware('user');
Route::get('/itinerary_database',[HomeController::class,'itinerary_database'])->name('itinerary_database')->middleware('user');
Route::get('expenses/report/download', [ExpenseController::class, 'downloadReport'])->name('expenses.downloadReport');
Route::get('/itineraries/report', [ItineraryController::class, 'downloadReport'])->name('itineraries.report');