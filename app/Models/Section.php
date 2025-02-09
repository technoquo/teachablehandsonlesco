<?php

namespace App\Models;

use App\Observers\SectionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([SectionObserver::class])]
class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'position',
    ];

    // Relaciones
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
