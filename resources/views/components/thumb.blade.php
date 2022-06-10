@props([
    'href' => '',
    'bg' => '',
    'detailed' => true,
    'movie' => '',
    'actor' => '',
    'genres' => '',
    'isMovie' => true,
])

<div class="mt-8 z-0">

    @if ($detailed)
        <a href="{{ $href }}" class="relative">
            <div class="bg-gradient-to-t from-zinc-900 to-transparent after:absolute after:top-0 after:left-0 after:w-full after:h-full after:bg-gradient-to-t after:from-black after:to-transparent after:opacity-75 after:rounded-lg hover:opacity-75 transition ease-in-out duration-1">
                <img class="rounded-lg shadow-md" src="{{ $bg }}">
            </div>
            <div class="absolute bottom-0 p-5">
                <div class="flex items-center text-gray-400 mb-2">

                    @for ($i=0; $i<floor($movie['vote_average']/2); $i++)
                        <span class="mr-2"><i class="fa-solid fa-star text-yellow-300 text-sm"></i></span>
                    @endfor

                    @for ($i=0; $i<5-floor($movie['vote_average']/2); $i++)
                        <span class="mr-2"><i class="fa-solid fa-star text-gray-800 text-sm"></i></span>
                    @endfor

                </div>
                <div class="text-lg text-gray-100 mb-1">{{ $isMovie ? $movie['title'] : $movie['name'] }}</div>
                <div class="text-sm text-gray-400">
                    @foreach ($movie['genre_ids'] as $genre)
                        {{ $genres->get($genre) }} @if (!$loop->last), @endif
                    @endforeach
                </div>
            </div>
        </a>
    @else
        <img class="rounded-lg shadow-md" src="{{ $bg }}">
        <div class="flex flex-col mt-2">
            {{ $actor['name'] }}
            <span class="text-xs text-gray-300">{{ $actor['character'] }}</span>
        </div>
    @endif

</div>
