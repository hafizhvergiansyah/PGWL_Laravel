<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PolylineController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\DasboardController;

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

Route::get('/', [MapController::class, 'index'])->name('index');
Route::get('/table', [MapController::class, 'table'])->name('table');
//create point
Route::post('/store-point', [PointController::class, 'store'])->name('store-point');
//create polyline
Route::post('/store-polyline', [PolylineController::class, 'store'])->name('store-polyline');
//create polygon
Route::post('/store-polygon', [PolygonController::class, 'store'])->name('store-polygon');
//delete point
route::delete('/delete-point/{id}', [PointController::class, 'destroy'])->name('delete-point');
//delete polyline
route::delete('/delete-polyline/{id}', [PolylineController::class, 'destroy'])->name('delete-polyline');
//delete polygon
route::delete('/delete-polygon/{id}', [PolygonController::class, 'destroy'])->name('delete-polygon');
//table
route::get('/table-points', [PointController::class, 'table'])->name('table-points');
//table polygon
route::get('/table-polygons', [PolygonController::class, 'table'])->name('table-polygons');
//table polyline
route::get('/table-polyline', [PolylineController::class, 'table'])->name('table-polyline');
//edit point
route::get('/edit-point/{id}', [PointController::class, 'edit'])->name('edit-point');
//update point
route::patch('/update-point/{id}', [PointController::class, 'update'])->name('update-point');
//edit polyline
route::get('/edit-polyline/{id}', [PolylineController::class, 'edit'])->name('edit-polyline');
//update polyline
route::patch('/update-polyline/{id}', [PolylineController::class, 'update'])->name('update-polyline');
//edit polygon
route::get('/edit-polygon/{id}', [PolygonController::class, 'edit'])->name('edit-polygon');
//update polygon
route::patch('/update-polygon/{id}', [PolygonController::class, 'update'])->name('update-polygon');

Route::get('/dashboard', [DasboardController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
