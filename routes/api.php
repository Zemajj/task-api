<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


# Создание API-маршрутов для ресурса task
Route::apiResource('tasks', TaskController::class);


