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