<?php

namespace App\Http\Livewire;

use App\Models\Product;
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
        $perPage = 8;

        if (!empty($keyword)) {
            //CASE SEARCH, show some
            $products = Product::where('title', 'LIKE', "%$keyword%")
                // ->orWhere('content', 'LIKE', "%$keyword%")
                // ->orWhere('price', 'LIKE', "%$keyword%")
                // ->orWhere('cost', 'LIKE', "%$keyword%")
                // ->orWhere('photo', 'LIKE', "%$keyword%")
                // ->orWhere('stock', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            // CASE NOT SEARCH, show all
            $products = Product::latest()->paginate($perPage);
        }
        return $products;
    }    

    public function render()
    {
        $products = $this->query();
        return view('livewire.shop',compact('products'));
    }
}
