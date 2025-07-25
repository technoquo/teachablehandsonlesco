<div class="space-y-3">
    {{--Video--}}
    <div>
        @if($editVideo)
            <div x-data="{ platform: @entangle('platform') }">
                <h2 class="font-semibold text-lg mb-1">
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
                        <x-progress-indicators wire:model="video" class="w-full"/>
                    </div>


                    <div class="mt-4 mb-2" x-show="platform == 2" x-cloak>
                        <x-label>Youtube URL</x-label>
                        <x-input wire:model="url" aria-placeholder="Ingrese la URL de Youtube" type="text"
                                 placeholder="Ingrese la URL de Youtube" class="w-full"/>
                    </div>

                    <div class="flex justify-end space-x-2 mt-4">
                        <x-danger-button wire:click="$set('editVideo', false)" class="mr-2">
                            Cancelar
                        </x-danger-button>

                        <x-button wire:click="saveVideo">
                            Actualizar
                        </x-button>
                    </div>

            </div>
        @else
            <div>
                <h2 class="font-semibold text-lg mb-1">
                    Video del Curso
                </h2>

                @if($lesson->is_processed)
                    <div>
                        <div class="md:flex md:items-center md:space-x-4 space-y-2 md:space-y-0 mb-2">
                            <img src="{{$lesson->image}}" alt="{{$lesson->name}}"
                                 class="w-full md:w-20 aspect-video object-cover object-center">
                            <p class="text-sm truncate md:flex-1 md:ml-4">
                                {{$lesson->video_original_name}}
                            </p>
                        </div>

                        <x-button wire:click="$set('editVideo', true)" class="mt-2">
                            Video
                        </x-button>
                    </div>
                @else
                    <div>
                        <table class="table-auto w-full">
                            <thead class="border-b border-gray-50">
                            <tr>
                                <th class="px-4 py-2">Nombre del archivo</th>
                                <th class="px-4 py-2">Tipo</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{$lesson->video_original_name}}</td>
                                <td class="border px-4 py-2">Video</td>
                                <td class="border px-4 py-2">

                                    Procesando...

                                </td>
                                <td class="border px-4 py-2">
                                {{ $lesson->created_at->format('d/m/Y') }}
                            </tr>
                            </tbody>
                        </table>
                        <p class="mt-4">
                            El video se está procesando. Esto puede tardar unos minutos dependiendo del tamaño del
                            archivo.
                        </p>
                    </div>
                @endif


            </div>
        @endif
    </div>

    <hr>
    <div>
        <h2 class="font-semibold">
            <span class="font-semibold text-lg mb-1">Contenido de la Lección</span>
        </h2>

        @if ($editDescription)
            <form wire:submit.prevent="saveDescription">
                <div
                    x-data
                    wire:ignore
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

                quill.root.innerHTML = @js($description);

                quill.on('text-change', () => {
                    @this.set('description', quill.root.innerHTML);
                });
            "
                >
                    <div x-ref="editor" class="bg-white border rounded p-2 mb-2" style="min-height: 200px;"></div>
                </div>

                <div class="flex justify-end mt-4">
                    <x-button type="submit">Actualizar</x-button>
                </div>
            </form>
        @else
            <div class="text-gray-700 mb-2">
                {!! $lesson->description ?? 'Sin descripción' !!}
            </div>
            <x-button wire:click="$set('editDescription', true)" class="mt-2">
                <i class="fas fa-edit"></i> Editar Descripción
            </x-button>
        @endif
    </div>

</div>
