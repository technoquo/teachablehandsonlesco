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
    public $sectionEdit = [
        'id' => null,
        'name' => null,
    ];

    public $orderLessons;

    public $sectionPositionCreate = [];

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
        $this->sections = Section::where('course_id', $this->course->id)
            ->with([
                'lessons' => function ($query) {
                    $query->orderBy('position', 'asc');
                }
            ])
            ->orderBy('position', 'asc')
            ->get();

        $this->orderLessons = $this->sections
            ->pluck('lessons')
            ->collapse()
            ->pluck('id');


        return $this->sections;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->course->sections()->create([
            'name' => $this->name,
        ]);

        $this->getSections();

        $this->reset('name');
    }

    public function storePosition($sectionId)
    {
        $this->validate([
            'sectionPositionCreate.'.$sectionId.'.name' => 'required',
        ]);

        $position = Section::find($sectionId)->position;

        Section::where('course_id', $this->course->id)
            ->where('position', '>=', $position)
            ->increment('position');


        $this->course->sections()->create([
            'name' => $this->sectionPositionCreate[$sectionId]['name'],
            'position' => $position,
        ]);


        $this->getSections();

        if (isset($this->sectionPositionCreate[$sectionId])) {
            $this->reset('sectionPositionCreate');
        }

        $this->dispatch('close-section-position-create');
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

    public function destroy(Section $section)
    {
        $section->delete();
        $this->getSections();

        $this->dispatch('swal', [
            "title" => "Eliminado!",
            "text" => "La sección ha sido eliminada ",
            "icon" => "success"
        ]);
    }

    public function sortSections($sorts)
    {

        foreach ($sorts as $position => $sectionId) {
            Section::find($sectionId)->update([
                'position' => $position + 1
            ]);
        }

        $this->getSections();
    }

    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
