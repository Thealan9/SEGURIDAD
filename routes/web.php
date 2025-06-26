<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Space;
use App\Http\Controllers\ReservationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//espacios que se pueden reservar
Route::get('/spaces', function () {
    $spaces = Space::all();// guarda en la var todos los datos de la tabla Space usando el model
    return view('spaces.index', compact('spaces')); // retorna la vista index que esta en la carpeta spaces y le pasas los valores de la variable spaces
});


// reservear
Route::middleware('auth')->group(function () {// solo usuarios logeados se le permite esta funcion 
    Route::get('/spaces/reserve', function () {
        $spaces = Space::all();
        return view('spaces.reserve', compact('spaces'));
    })->name('spaces.reserve');

    Route::post('/spaces/reserve', [ReservationController::class, 'store'])->name('spaces.reserve');
});


// Mostar las reservaciones 
Route::get('/reservations', function () {
    $reservations = auth()->user()->reservations; // que hace esto?
    return view('reservations.index', compact('reservations'));
})->middleware('auth')->name('reservations.index');


//cancelaciones 
Route::patch('/reservations/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');



require __DIR__.'/auth.php';
