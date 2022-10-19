<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('events.index');
});

/* TODO: How would you implement auth for these routes? - add a route group with auth as middleware
Route::controller(EventController::class)->middleware(['middleware' => 'auth'])->prefix('events')->group(function () {
    Route::get('', [EventController::class, 'index'])->name('events.index');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('', [EventController::class, 'store'])->name('events.store');
    Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});
*/


// TODO: How could we make this more readable?
//using route group
Route::controller(EventController::class)->prefix('events')->group(function () {
    Route::get('', 'index')->name('events.index');
    Route::get('/create', 'create')->name('events.create');
    Route::post('', 'store')->name('events.store');
    Route::get('/{event}', 'show')->name('events.show');
    Route::get('/{event}/edit', 'edit')->name('events.edit');
    Route::put('/{event}', 'update')->name('events.update');
    Route::delete('/{event}', 'destroy')->name('events.destroy');
});

/* you could also use partial resource route, if you want it to be shorten
    Route::resource('events', EventController::class);
*/
