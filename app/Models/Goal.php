<?php

namespace App\Models;

use App\Observers\GoalObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([GoalObserver::class])]
class Goal extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'course_id',
        'position',
    ];
}
