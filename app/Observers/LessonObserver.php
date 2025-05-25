<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    public function creating(Lesson $lesson)
    {
      
            $lesson->position = Lesson::where('section_id', $lesson->section_id)->max('position') + 1;
        
    }
   
}
