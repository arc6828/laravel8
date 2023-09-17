<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        // FILTER BY SEARCH        
        $keyword = $request->get('search');
        $movie = Movie::where('category_id', 'LIKE', "%$keyword%")
            ->orWhere('title', 'LIKE', "%$keyword%")
            ->orWhere('actor', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%");

        // WITH SUM
        $movie = $movie->withSum('orderlines','quantity');

        // ORDER BY
        $sort = $request->get('sort');
        switch($sort)
        {
            case "best-seller" : $movie = $movie->orderBy('price','asc'); break;
            case "price-asc" : $movie = $movie->orderBy('price','asc'); break;
            case "price-desc" : $movie = $movie->orderBy('price','asc'); break;
        }
        

        // PAGINATION
        $perPage = 25;
        $movie = $movie->paginate($perPage);
        return view('movie.index', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Movie::create($requestData);

        return redirect('movie')->with('flash_message', 'Movie added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $movie = Movie::findOrFail($id);
        $movie->update($requestData);

        return redirect('movie')->with('flash_message', 'Movie updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Movie::destroy($id);

        return redirect('movie')->with('flash_message', 'Movie deleted!');
    }
}
