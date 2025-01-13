<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear un nuevo curso
        </h2>
    </x-slot>
    <x-container class="mt-12" width="4xl">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-2xl uppercase text-center mb-4">Complete esta información para crear un curso</h2>

                <x-validation-errors class="mb-4" :errors="$errors" />

                <div class="mb-4">
                    <x-label for="title" value="Nombre del curso" class="mb-1" />
                    <x-input
                     class="w-full" 
                     aria-placeholder="Nombre del curso"
                     placeholder="Nombre del curso"
                     name="title" 
                     value="{{ old('title') }}" 
                     oninput="string_to_slug(this.value,'#slug')"
                     />
                </div>
                <div class="mb-4">
                    <x-label for="Slug" value="Slug" class="mb-1" />
                    <x-input 
                        class="w-full" aria-placeholder="slug" 
                        id="slug"
                        placeholder="Slug del curso" 
                        name="slug"
                        value="{{ old('slug') }}"                    
                        />
                </div>

                <div class="grid md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <x-label class="mb-1">
                            Categorías
                        </x-label>
                        <x-select class="w-full" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{
                                $category->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div>
                        <x-label class="mb-1">
                            Niveles
                        </x-label>
                        <x-select class="w-full" name="level_id">
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}" @selected(old('level_id')==$level->id)>{{ $level->name }}
                            </option>
                            @endforeach
                        </x-select>
                    </div>
                    <div>
                        <x-label class="mb-1">
                            Precios
                        </x-label>
                        <x-select class="w-full" name="price_id">
                            @foreach ($prices as $price)
                            <option value="{{ $price->id }}" @selected(old('price_id')==$price->id)>
                                @if ($price->value == 0)
                                Gratis
                                @else
                                ₡ {{ $price->value }}
                                @endif
                            </option>
                            @endforeach
                        </x-select>
                    </div>

                   


             
                <div class="flex justify-end items-center">
                    <x-button>
                        Crear curso
                    </x-button>
                </div>
            </form>
        </div>

    </x-container>
</x-instructor-layout>