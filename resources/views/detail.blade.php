@extends('layouts.main')

@section('content')
    <section class="border-b border-gray-700">
        <div class="container mx-auto px-6 py-12 text-white flex">
            <img class="w-96 rounded-lg" src="{{ 'https://image.tmdb.org/t/p/original/'.$details['poster_path'] }}">
            <div class="ml-24 relative">
                <h2 class="text-4xl font-semibold">{{ $details['title'] }}</h2>

                <div class="flex flex-wrap">
                    <div class="flex items-center text-gray-400 text-sm mt-2">
                        <div>
                            <i class="fa-regular fa-star-half-stroke text-yellow-400"></i>
                            <span>{{ $details['vote_average']*10 }}%</span>
                        </div>
                        <span class="mx-2">|</span>
                        <div>{{ date('d/m/Y', strtotime($details['release_date'])) }}</div>
                        <span class="mx-2">|</span>
                        <div>
                            @foreach ($details['genres'] as $genre)
                                {{ $genre['name'] }} @if (!$loop->last), @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <p class="text-gray-300 mt-8 text-justify">
                    {{ $details['overview'] }}
                </p>

                @if (Storage::exists('uploads/' . $details['id'] . '.mp4'))
                    <p class="mt-8">
                        <a href="{{ '/player/'.$details['id'] }}" class="py-3 px-6 bg-orange-500 text-gray-900 rounded-lg text-lg shadow-md hover:bg-orange-400 transition ease-out duration-1">
                            <i class="fa-regular fa-circle-play mr-1"></i>
                            Regarder
                        </a>
                    </p>
                @else
                    <p class="mt-8">
                        <x-button disabled>Non disponible</x-button>
                    </p>
                @endif
            </div>
        </div>
    </section>

    <section class="border-b border-gray-700">
        <div class="container mx-auto px-6 py-12 text-white">
            <h2 class="text-4xl font-semibold">Casting</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @if (sizeof($cast) >=4)
                    @for ($i=0; $i<4; $i++)
                        <x-thumb :actor="$cast[$i]" :detailed="false" :bg="'https://image.tmdb.org/t/p/original/'.$cast[$i]['profile_path']" :href="''"></x-thumb>
                    @endfor
                @else
                    @foreach ($cast as $actor)
                        <x-thumb :actor="$actor" :detailed="false" :bg="'https://image.tmdb.org/t/p/original/'.$actor['profile_path']" :href="''"></x-thumb>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    <section class="border-b border-gray-700">
        <div class="container mx-auto px-6 py-12 text-white">
            <form action="/upload/{{ $details['id'] }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="file" class="block mb-5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="dropzone_file" type="file">
            </form>
        </div>
    </section>

    <script>
        const input = document.querySelector('input[id="dropzone_file"]');
        const pond = FilePond.create(input);

        pond.labelIdle = 'Déposer le fichier ou <span class="text-orange-500"> Explorer </span>';
        pond.labelFileProcessingComplete = "Upload terminé";
        pond.labelFileProcessing = "Téléversement ...";
        pond.labelTapToUndo = "Appuyer pour annuler";
        pond.labelTapToCancel = "Appuyer pour annuler";
        pond.credits = false;

        FilePond.setOptions({
            server: {
                url: '/upload/{{ $details['id'] }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        })
    </script>
@endsection
