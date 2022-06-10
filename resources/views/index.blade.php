@extends('layouts.main')

@section('content')
    <section class="container mx-auto px-6 pt-14 pb-14">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Films récents</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach ($popularMovies as $movie)
                <x-thumb :genres="$genres" :movie="$movie" :bg="'https://image.tmdb.org/t/p/original/'.$movie['poster_path']" :href="'/movies/'.$movie['id']"></x-thumb>
            @endforeach

        </div>

    </section>
@endsection
