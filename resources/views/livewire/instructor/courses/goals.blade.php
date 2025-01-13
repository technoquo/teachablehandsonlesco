<div>

    @if($goals)
    <ul class="mb-4 space-y-2" id="goals">
        @foreach ($goals as $index => $goal)
            <li wire:key="{{ $goal['id'] }}" data-id="{{ $goal['id'] }}">
                <div class="flex items-center">
                    <x-input wire:model="goals.{{ $index }}.name" class="flex-1 rounded-r-none" />
                    <div class="border border-gray-300 rounded-l-none px-4 py-2 flex items-center divide-x divide-gray-300 border-r">
                        <!-- Trash Icon -->
                        <button class="hover:text-red-500 pr-2" onclick="destroyGoal({{ $goal['id'] }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <!-- Mover Icon -->
                        <div class="pl-2 cursor-move">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-end mb-8">
        <x-button wire:click="update">
            Actualizar
        </x-button>
    </div>
     @endif
    <form wire:submit.prevent="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nueva Meta
            </x-label>

            <x-input wire:model="name" class="w-full" aria-placeholder="Meta" placeholder="Ingrese el nombre de la meta" />

            <x-input-error for="name" class="mt-2" />


            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar Meta
                </x-button>

            </div>

        </div>
    </form>

    @push('js')

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    <script>
        const goals = document.getElementById('goals');
        new Sortable(goals, {
            animation: 150,           
            ghostClass: "bg-gray-400",
            store: {              
                set: (sortable) => {                   
                    @this.call('sortGoals', sortable.toArray());
                }
            }        
        });

    </script>

       <script>
           function destroyGoal(id)
            {
                Swal.fire({
                        title: "Estas seguro de eliminar esta meta?",
                        text: "No podras revertir esta accion!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar!",
                        cancelButtonText: "Cancelar"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                            title: "Meta Eliminada!",
                            text: "La meta ha sido eliminada.",
                            icon: "success"
                            });

                            @this.call('destroy', id);
                        }
                });
            }
       </script>
        
    @endpush
</div>
