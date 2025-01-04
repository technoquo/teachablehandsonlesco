<?php

namespace App\Models;


use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'status',
        'image_path',
        'video_path',
        'welcome_message',
        'goodbye_message',
        'observation',
        'user_id',
        'category_id',
        'level_id',
        'price_id',
    ];

    protected $casts = [
        'status' =>  CourseStatus::class,
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

}
