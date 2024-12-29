<?php

use Illuminate\Support\Facades\Route;

Route::get('/instructor', function(){
    return 'Instructor Panel';
})->name('instructor');
