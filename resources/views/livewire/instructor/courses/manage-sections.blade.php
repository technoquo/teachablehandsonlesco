<div>
    <div 
    x-data="{
        destroySection(sectionId) {
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
    }" 
    x-init="new Sortable($refs.sections, { 
        animation: 150,  
        handle: '.handle',         
        ghostClass: 'bg-gray-400', 
        store: { 
            set: (sortable) => {
                @this.call('sortSections', sortable.toArray());
            }
        }
    });"
>

        {{--Listar secciones --}}
        @if ($sections->count())
        <ul class="mb-6 space-y-6" x-ref="sections">
            @foreach($sections as $section)
            <li data-id="{{$section->id}}" wire:key="seccion-{{$section->id}}">

                   @include('instructor.sections.create-position')

                <div class="bg-gray-100 rounded-lg shadow-lg px-6 py-4 mt-6">
                    @if($sectionEdit['id'] == $section->id)

                     @include('instructor.sections.edit')

                    @else
                      @include('instructor.sections.show')
                    @endif                    
                </div>
            </li>
            @endforeach

        </ul>
        @endif

        @include('instructor.sections.create')
    </div>

    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    @endpush


</div>