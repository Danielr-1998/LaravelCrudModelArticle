<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DateController;
Route::get('/dates/{id}', function () {
    return 'Citas por Id';
});
Route::get('/dates',[DateController::class,'index']);
Route::post('/dates',[DateController::class,'store']);

Route::put('/dates/{id}', function () {
    return 'Actualizando Citas';
});

Route::delete('/dates/{id}', function () {
    return 'Eliminar Cita';
});
