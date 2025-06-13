<?php

use App\Models\Lesson;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

Route::get('/', function () {
    return view('welcome');
});


Route::get('prueba', function () {
    $course = \App\Models\Course::first();

    $sections = $course->sections()
        ->with([
            'lessons' => function ($query) {
                $query->orderBy('position', 'desc');
            }
        ])
        ->get();

    $orderLessons = $sections->pluck('lessons')
        ->collapse()
        ->pluck('id');

    return $orderLessons;
});



