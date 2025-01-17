@props(['course'])

@php
$links = [
            [
                'name' => 'Información del curso',
                'route' => route('instructor.courses.edit', $course),
                'active' => request()->routeIs('instructor.courses.edit'),
            ],
            [
                'name' => 'Video Promocional',
                'route' => route('instructor.courses.video', $course),
                'active' => request()->routeIs('instructor.courses.video'),
            ],
            [
                'name' => 'Metas del curso',
                'route' => route('instructor.courses.goals', $course),
                'active' => request()->routeIs('instructor.courses.goals'),
            ],
            [
                'name' => 'Requisitos del curso',
                'route' => route('instructor.courses.requirements', $course),
                'active' => request()->routeIs('instructor.courses.requirements'),
            ],
]


@endphp
<x-container class="py-8" width="7xl">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <aside class="col-span-1">
            <h1>
                <h1 class="font-semibold text-lg text-gray-800 mb-4">Edición del curso</h1>
            </h1>
            <nav>
                <ul>
                    @foreach ($links as $link)
                    <li class="border-l-4 {{ $link['active'] ? 'border-indigo-400' : 'border-transparent' }} pl-3">
                        <a href="{{ $link['route'] }}" class="font-semibold text-gray-600 mb-4 block">{{ $link['name']
                            }}</a>
                    </li>
                    @endforeach
                </ul>

            </nav>

        </aside>

        <div class="col-span-1 lg:col-span-4">
            <div class="card">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-container>