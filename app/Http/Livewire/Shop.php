<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    
    public $keyword;

    public function query()
    {
        // GET SEARCH KEYWORD
        // $keyword = request('search');
        $keyword = $this->keyword;

        // DEFINE ITEM PER PAGE
        $perPage = 10;

        if (!empty($keyword)) {
            //CASE SEARCH, show some
            $movies = Movie::where('title', 'LIKE', "%$keyword%")
                ->orWhere('actor', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            // CASE NOT SEARCH, show all
            $movies = Movie::latest()->paginate($perPage);
        }
        return $movies;
    }    

    public function render()
    {
        $movies = $this->query();
        return view('livewire.shop',compact('movies'));
    }
}
