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
        <form action="{{ route('instructor.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="font-semibold text-2xl mb-4">Información del curso</p>
            <hr class="mb-4">
            <x-validation-errors class="mb-4"/>

            <div class="mb-4">
                <x-label class="font-semibold text-lg text-gray-800" value="Título del curso"/>
                <x-input type="text" name="title" value="{{ old('title', $course->title) }}"
                         class="form-input block w-full mt-1"/>
            </div>

            @empty($course->published_at)
                <div class="mb-4">
                    <x-label class="font-semibold text-lg text-gray-800" value="Slug del curso"/>
                    <x-input type="text" name="slug" value="{{ old('slug', $course->slug) }}"
                             class="form-input block w-full mt-1"/>
                </div>
            @endempty

            <div class="mb-4">
                <x-label class="font-semibold text-lg text-gray-800" value="Resumen"/>
                <textarea name="summary" class="form-input block w-full mt-1"
                          rows="3">{{ old('summary', $course->summary) }}</textarea>
            </div>

            <div class="mb-4">
                <x-label class="font-semibold text-lg text-gray-800" value="Descripción"/>
                <!-- Editor Quill -->
                <div
                    x-data
                    x-init="
            const toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video', 'formula'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'font': [] }],
                [{ 'align': [] }],
                ['clean']
            ];

            const quill = new Quill($refs.editor, {
                modules: { toolbar: toolbarOptions },
                theme: 'snow'
            });

            quill.root.innerHTML = @js($course->description);

              // Sincronización en tiempo real
            quill.on('text-change', () => {
                $refs.input.value = quill.root.innerHTML;
            });

            // También actualizamos justo antes del submit (por si acaso)
            $refs.form.addEventListener('submit', () => {
                $refs.input.value = quill.root.innerHTML;
            });


        "
                    x-ref="form"
                >
                    <div x-ref="editor" class="bg-white border rounded p-2 mb-2" style="min-height: 200px;"></div>
                    <!-- Campo oculto que se enviará con el contenido HTML -->
                    <input type="hidden" name="description" x-ref="input"
                           value="{{ old('description', $course->description) }}">
                </div>

                <!-- Category, Level, and Price Fields -->
                <div class="grid md:grid-cols-3 gap-4 mb-8">
                    <div>
                        <x-label class="mb-1">Categorías</x-label>
                        <x-select class="w-full" name="category_id">
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}" @selected(old('category_id', $course->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>
                    <div>
                        <x-label class="mb-1">Niveles</x-label>
                        <x-select class="w-full" name="level_id">
                            @foreach ($levels as $level)
                                <option
                                    value="{{ $level->id }}" @selected(old('level_id', $course->level_id) == $level->id)>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>
                    <div>
                        <x-label class="mb-1">Precios</x-label>
                        <x-select class="w-full" name="price_id">
                            @foreach ($prices as $price)
                                <option
                                    value="{{ $price->id }}" @selected(old('price_id', $course->price_id) == $price->id)>
                                    @if ($price->value == 0)
                                        Gratis
                                    @else
                                        ₡ {{ $price->value }}
                                    @endif
                                </option>
                            @endforeach
                        </x-select>
                    </div>
                </div>

                <!-- Course Image Section -->
                <div class="mb-4">
                    <p class="font-semibold text-2xl mb-2">Imagen del curso</p>
                    <div class="grid grid-cols-2 gap-4">
                        <figure>
                            <img id="imgPreview" class="w-full h-48 object-video object-cover object-center"
                                 src="{{ $course->image }}" alt="">
                        </figure>
                        <div>
                            <label>
                                <span class="btn btn-blue md:hidden cursor-pointer">Selecciona una imagen</span>
                                <input class="hidden md:block" type="file" name="image"
                                       onchange="preview_image(event, '#imgPreview')"/>
                            </label>
                            <div class="flex md:justify-end items-center mt-4">
                                <x-button>Actualizar curso</x-button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </x-instructor.course-sidebar>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    @endpush
</x-instructor-layout>
