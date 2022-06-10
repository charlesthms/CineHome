<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MoviesController extends Controller
{
    public function index()
    {
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?language=fr-FR')
            ->json()['results'];

        $shows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular?language=fr-FR')
            ->json()['results'];


        $genresTab = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=fr-FR')
        ->json()['genres'];

        $genres = collect($genresTab)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('index', [
            'popularMovies' => collect($movies)->take(8),
            'shows' => collect($shows)->take(8),
            'genres' => $genres,
        ]);
    }

    public function show($id)
    {
        $details = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?language=fr-FR')
            ->json();

        $cast = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'/credits?language=fr-Fr')
            ->json()['cast'];

        return view('detail', [
            'details' => $details,
            'cast' => $cast,
        ]);
    }

    public function stream($id)
    {
        return view('stream', [
            'id' => $id,
        ]);
    }
}
