<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', TaskController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('courses', CourseController::class);
