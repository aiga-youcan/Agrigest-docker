<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelleController;


Route::resource('parcelles', ParcelleController::class);
Route::get('/test', function(){return "ok";});

Route::get('/', function () {
    return redirect()->route('parcelles.index');
});

