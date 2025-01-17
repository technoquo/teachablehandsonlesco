<?php

namespace App\Models;

use App\Observers\RequerimentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([RequerimentObserver::class])]
class Requeriment extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'course_id',
        'position',
    ];
}
