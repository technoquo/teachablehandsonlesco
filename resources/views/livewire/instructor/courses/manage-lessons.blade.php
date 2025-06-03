<div>
    <div class="mb-6">
        <ul class="space-y-4">
            @foreach($lessons as $lesson)
            <li wire:key="lesson-{{ $lesson->id }}" class="mb-2">
                <div class="bg-white rounded-lg shadow-lg px-6 py-4">
                    <div class="md:flex  md:items-center">
                        <h1 class="md:flex-1 truncate cursor-move">
                            <i class="fas fa-play-circle text-indigo-500 mr-2"></i>
                            {{ $lesson->name }}
                        </h1>
                        <div class="space-x-3 md:shrink-0 md:ml-4">
                            <button>
                                <i class="fas fa-edit hover:text-blue-500 cursor-pointer"></i>
                            </button>
                            <button>
                                <i class="fas fa-trash hover:text-red-500 cursor-pointer"></i>
                            </button>
                            <button>
                                <i class="fas fa-chevron-down hover:text-blue-500 cursor-pointer"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </li>
            @endforeach
        </ul>

    </div>
    <div x-data="{
        open: @entangle('lessonCreate.open'),
        platform: @entangle('lessonCreate.platform'),
    }">
        <div x-on:click="open = !open"
            class="h-6 w-12 -ml-4 bg-indigo-200 hover:bg-indigo-300 flex items-center justify-center cursor-pointer"
            style="clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 0 51%, 0% 0%);">
            <i class="-ml-2 text-sm fas fa-plus transition duration-300" :class="{
                    'transform rotate-45': open,
                    'transform rotate-0': !open
                }"></i>
        </div>

        <form wire:submit.prevent="store" class="mt-4 bg-white rounded-lg shadow-lg p-6" x-show="open" x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95">
            <div class="p-6">
                <div class="mb-2">
                    <x-input wire:model="lessonCreate.name" class="w-full" aria-placeholder="Requisito"
                        placeholder="Ingrese el nombre de la lección" />
                    <x-input-error for="lessonCreate.name" class="mt-2" />
                </div>

                <div>
                    <x-label class="mb-2">Plataformas</x-label>
                    <div class="md:flex md:items-center md:space-x-4 md:space-y-0">
                        <div class="md:flex md:items-center md:space-x-4 space-y-4 md:space-y-0">
                            <button type="button"
                                class="inline-flex flex-col justify-center items-center w-full md:w-20 h-24 border rounded"
                                :class="platform == 1 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'"
                                @click="platform = 1">
                                <i class="fas fa-video text-2xl"></i>
                                <span class="text-sm mt-2">Video</span>
                            </button>
                            <button type="button"
                                class="inline-flex flex-col justify-center items-center w-full md:w-20 h-24 border rounded"
                                :class="platform == 2 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'"
                                @click="platform = 2">
                                <i class="fab fa-youtube text-2xl"></i>
                                <span class="text-sm mt-2">Youtube</span>
                            </button>
                        </div>
                        <p class="text-gray-500 text-sm ml-4">
                            Seleccione la plataforma para la lección.
                        </p>
                    </div>


                    <div class="mt-4 mb-2" x-show="platform == 1" x-cloak>
                        <x-label>Video</x-label>
                        <x-progress-indicators wire:model="video" class="w-full" />
                    </div>


                    <div class="mt-4 mb-2" x-show="platform == 2" x-cloak>
                        <x-label>Youtube URL</x-label>
                        <x-input wire:model="url" aria-placeholder="Ingrese la URL de Youtube" type="text"
                            placeholder="Ingrese la URL de Youtube" class="w-full" />
                    </div>
                </div>
            </div>

            <div class="flex justify-end px-6 py-4 bg-gray-100">
                <x-danger-button x-on:click="open = false" class="mr-2" type="button">
                    Cancelar
                </x-danger-button>
                <x-button type="submit">
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</div>