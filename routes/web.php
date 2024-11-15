<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObituaryController;
use Illuminate\Support\Facades\File;


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
    return view('obituary_form');
});

Route::post('/submit_obituary', [App\Http\Controllers\ObituaryController::class, 'submit'])->name('submit_obituary');

Route::get('/obituaries', [ObituaryController::class, 'index'])->name('index');

Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
});
