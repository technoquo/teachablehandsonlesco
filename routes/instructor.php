<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;


Route::redirect('/', 'instructor/courses')->name('home');

/** CURSOS **/
 Route::resource('courses', CourseController::class);


 Route::get('courses/{course}/video', [CourseController::class, 'video'])->name('courses.video');

 Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

 Route::get('courses/{course}/requeriments', [CourseController::class, 'requirements'])->name('courses.requirements');

 Route::get('courses/{course}/curriculum', [CourseController::class, 'curriculum'])->name('courses.curriculum');

