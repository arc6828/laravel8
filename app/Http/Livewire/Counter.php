<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Counter extends Component
{
    use WithPagination; 
    
    public $count = 0;
    public $message;
    public $keyword;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->keyword = "";
        $this->message = "hello world2";
    }
 
    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }

    public function render()
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

        // return view('product.index', compact('products'));

        return view('livewire.counter',compact('products'));
    }
}
