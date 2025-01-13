<x-instructor-layout>  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>


        <x-instructor.course-sidebar :course="$course">

            @livewire('instructor.courses.promotional-video', ['course' => $course])

        </x-instructor.course-sidebar>


</x-instructor-layout>