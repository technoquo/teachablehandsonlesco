<?php

namespace App\Observers;

use App\Models\Goal;

class GoalObserver
{
    public function creating(Goal $goal)
    {
          $goal->position = Goal::where('course_id', $goal->course_id)->max('position') + 1;
    }
}
