<div>

    @push('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    @endpush
    <h1 class="font-semibold text-lg text-gray-800 mb-4">Video Promocional</h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            @if ($course->video_path)
            <div wire:ignore>
                <div x-data x-init="
                let player = new Plyr($refs.player);">
                    <video x-ref="player" playsinline controls data-poster="{{ $course->image }}" class="aspect-video">
                        <source src="{{ Storage::url($course->video_path) }}">
                    </video>
                </div>
            </div>
            @else
            <figure>
                <img class="w-full object-video object-cover" src="{{ $course->image }}" alt="{{ $course->title }}">
            </figure>
            @endif


        </div>
        <div class="col-span-1">
            <form wire:submit.prevent="save">
                <x-validation-errors />
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, cupiditate quasi? Mollitia in
                    quibusdam, dicta expedita maiores non, quam corporis, nesciunt qui atque amet voluptatem. Unde,
                    laboriosam? Illum, autem ratione.

                    <x-progress-indicators wire:model="video" />

                <div class="flex justify-end mt-4">
                    <x-button class="btn btn-primary">Subir video</x-button>
                </div>
                </p>
            </form>
        </div>
    </div>
    @push('js')
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

    @endpush
</div>