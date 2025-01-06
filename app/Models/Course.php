<?php

namespace App\Models;


use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function image(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->image_path ? Storage::url($this->image_path) : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-no-image-available-icon-flatvector-illustration-pic-design-profile-vector-png-image_40966566.jpg';
            }
        );
    }

    // Relaciones
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
