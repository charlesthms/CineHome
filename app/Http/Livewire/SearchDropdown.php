<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchDropdown extends Component
{

    public $search = '';

    public function render()
    {

        $results = [];

        if (strlen($this->search) >= 2)
        {
            $results = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?language=fr-FR&query='.$this->search)
                ->json()['results'];
        }

        return view('livewire.search-dropdown', [
            'results' => collect($results)->take(10),
        ]);
    }
}
