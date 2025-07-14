<div>
    {{--Video--}}
    @if($editVideo)
        <div>
            Esta por editar el video.
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
                        El video se está procesando. Esto puede tardar unos minutos dependiendo del tamaño del archivo.
                    </p>
                </div>
            @endif


        </div>
    @endif

</div>
