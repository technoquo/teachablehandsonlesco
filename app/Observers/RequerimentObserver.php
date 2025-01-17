<?php

namespace App\Observers;

use App\Models\Requeriment;

class RequerimentObserver
{
    public function creating(Requeriment $requeriment)
    {
          $requeriment->position = Requeriment::where('course_id', $requeriment->course_id)->max('position') + 1;
    }
}
