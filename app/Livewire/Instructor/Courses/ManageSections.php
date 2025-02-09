<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

class ManageSections extends Component
{
    public $course;
    public $name;

    public $sections;
    public $sectionEdit  = [
        'id' => null,
        'name' => null,
    ];

    public function mount($courseId)
    {
        $this->course = Course::find($courseId);

        if (!$this->course) {
            abort(404, 'Course not found');
        }

        $this->getSections();
    }

    public function getSections()
    {
        return $this->sections = Section::where('course_id', $this->course->id)
        ->orderBy('position', 'asc')
        ->get();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->course->sections()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
    }

    public function edit(Section $section)
    {
        $this->sectionEdit = [
            'id' => $section->id,
            'name' => $section->name,
        ];
    }

    public function update()
    {
        $this->validate([
            'sectionEdit.name' => 'required',
        ]);

        Section::find($this->sectionEdit['id'])->update([
            'name' => $this->sectionEdit['name'],
        ]);

        $this->reset('sectionEdit');
        $this->getSections();
    }
    
    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
