<x-instructor-layout>
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet"/>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>


    <x-instructor.course-sidebar :course="$course">


        <livewire:instructor.courses.manage-sections :courseId="$course->id"/>

    </x-instructor.course-sidebar>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    @endpush


</x-instructor-layout>
