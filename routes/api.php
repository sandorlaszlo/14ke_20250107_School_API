<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('students/search/{name}', [StudentController::class, 'searchByName']);
Route::get('students/{student}/teachers', [StudentController::class, 'teachersOfStudent']);
Route::post('students/{student}/add-student-to-teacher', [StudentController::class, 'addStudentToTeacher']);
Route::apiResource('students', StudentController::class);

Route::get('courses/{course}/students', [CourseController::class, 'studentsOfCourse']);
Route::apiResource('courses', CourseController::class);