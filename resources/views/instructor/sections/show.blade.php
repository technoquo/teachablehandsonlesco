<div class="md:flex  md:items-center">
    <h1 class="md:flex-1 truncate handle cursor-move">
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