<div class="relative" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class="bg-gray-800 rounded-full w-80 px-4 pl-10 py-1 focus:outline-none focus:ring-1"
        placeholder="Rechercher"
        @focus="isOpen = true"
        >
    <div class="absolute top-0">
        <i class="fa-solid fa-magnifying-glass text-gray-500 mt-2 ml-3 text-md"></i>
    </div>

    <div wire:loading class="spinner top-1 right-1 mr-4 mt-3" style="position: absolute !important;"></div>

    @if (strlen($search) >= 2)
        <div x-show="isOpen" class="absolute z-10 bg-gray-800 rounded-lg w-80 mt-4 shadow-lg">
            @if($results->count() > 0)
                <ul>
                    @foreach ($results as $result)
                        <li @if (!$loop->last) class="border-b border-gray-700" @endif>
                            <a href="{{ route('movies.show', $result['id']) }}" class="hover:bg-gray-700 p-3 flex items-center">
                                @if ($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" class="w-12 h-auto rounded-lg shadow-md">
                                @else
                                    <img src="https://via.placeholder.com/50x75" class="w-15 h-auto rounded-lg shadow-md">
                                @endif
                                <span class="ml-2">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="p-3">
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                    Aucun résultat pour "{{ $search }}"
                </div>
            @endif
        </div>
    @endif

</div>
