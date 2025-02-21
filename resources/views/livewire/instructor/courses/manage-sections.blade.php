<div x-data="{
  destroySection(sectionId){
  Swal.fire({
        title: '¿Estás seguro?',
        text: '¡No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, bórralo!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
         @this.call('destroy', sectionId);

        }
        });
  }
}">

    {{--Listar secciones --}}
    @if ($sections->count())
    <ul class="mb-6 space-y-6">
        @foreach($sections as $section)
        <div x-data="{
            open: false
        }" x-on:close-section-position-create.window="open = false">
            <div x-on:click="open = !open"
                class="h-6 w-12 -ml-4 bg-indigo-50 hover:bg-indigo-200 flex items-center justify-center cursor-pointer"
                style="clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 0 51%, 0% 0%);">

                <i class="-ml-2 text-sm fas fa-plus transition duration-300" :class="{
                        'transform rotate-45': open,
                        'transform rotate-0': !open
                    }"></i>
            </div>

            <div x-show="open" x-cloak class="mt-6">
                <form wire:submit="storePosition({{ $section->id }})">
                    <div class="bg-gray-100 rounded-lg shadow-lg p-6">
                        <x-label>
                            Nueva sección
                        </x-label>

                        <x-input wire:model="sectionPositionCreate.{{ $section->id }}.name" class="w-full"
                            placeholder="Ingrese el nombre de la sección" />
                        <x-input-error for="sectionPositionCreate.{{ $section->id }}.name" />

                        <div class="flex justify-end mt-4">
                            <div class="space-x-2">
                                <x-danger-button x-on:click="open = false">
                                    Cancelar
                                </x-danger-button>

                                <x-button>
                                    Agregar
                                </x-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <li wire:key="seccion-{{$section->id}}">
            <div class="bg-gray-100 rounded-lg shadow-lg p-6">
                @if($sectionEdit['id'] == $section->id)

                <form wire:submit.prevent='update'>

                    <div class="flex items-center space-x-1">
                        <x-label>
                            Sección {{$section->position}}:
                        </x-label>

                        <x-input wire:model="sectionEdit.name" class="flex-1" aria-placeholder="Requisito"
                            placeholder="Ingrese el nombre de la sección" />
                    </div>
                    <div class="flex justify-end mt-4">
                        <div class="space-x-2">
                            <x-danger-button wire:click="$set('sectionEdit.id', null)">
                                Cancelar
                            </x-danger-button>

                            <x-button>
                                Actualizar
                            </x-button>
                        </div>
                    </div>


                </form>

                @else
                <div class="md:flex  md:items-center">
                    <h1 class="md:flex-1 truncate">
                        Seccion {{$loop->iteration}}:
                        <br class="md:hidden">
                        <span class="font-semibold">{{$section->name}}</span>
                    </h1>
                    <div class="space-x-3 md:shrink-0 md:ml-4">
                        <button wire:click="edit({{$section->id}})">
                            <i class="fas fa-edit hover:text-blue-500 cursor-pointer"></i>
                        </button>
                        <button x-on:click="destroySection({{$section->id}})">
                            <i class="fas fa-trash hover:text-red-500 cursor-pointer"></i>
                        </button>
                    </div>
                </div>
                @endif



                {{-- <div class="flex justify-end mt-4">--}}
                    {{-- <a href="{{route('instructor.courses.sections.edit', $section)}}"
                        class="text-blue-500 hover:text-blue-600">Editar</a>--}}
                    {{-- </div> --}}
            </div>
        </li>
        @endforeach

    </ul>
    @endif

    <div x-data='{ open: false}'>
        <div x-on:click="open = !open"
            class="h-6 w-12 -ml-4 bg-indigo-50 hover:bg-indigo-200 flex items-center justify-center cursor-pointer"
            style="clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 0 51%, 0% 0%);">

            <i class="-ml-2 text-sm fas fa-plus transition duration-300" :class="{
            'transform rotate-45': open,
            'transform rotate-0': !open
        }"></i>
        </div>
        {{-- Crear nueva session--}}
        <div x-show="open" x-cloak class="mt-4">
            <form wire:submit.prevent="store">
                <div class="bg-gray-100 rounded-lg shadow-lg p-6">
                    <x-label>
                        Nueva sección
                    </x-label>
    
                    <x-input wire:model="name" class="w-full" aria-placeholder="Requisito"
                        placeholder="Ingrese el nombre de la sección" />
    
                    <x-input-error for="name" class="mt-2" />
    
    
                    <div class="flex justify-end mt-4">
                        <x-button>
                            Agregar sección
                        </x-button>
    
                    </div>
    
                </div>
            </form>
        </div>
    </div>
</div>