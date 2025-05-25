<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use Livewire\WithFileUploads;


class ManageLessons extends Component
{
    use WithFileUploads;

    public $section;
    public $lessson;

    public $video, $url;

    public $lessonCreate = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'platform' => 1,
        'video_path' => null,
        'video_original_name' => null,
        'video_duration' => null,
    ];


    
    public function render()
    {
        return view('livewire.instructor.courses.manage-lessons');
    }
}
