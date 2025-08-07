<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {
    route::get('/estudiantes', [SchoolController::class, 'estudiantes']);
    route::get('/profesor/{teacherId}', [SchoolController::class, 'profesor']);
    route::get('/listado', [SchoolController::class, 'listado']);
});


