<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;

class BeerController extends Controller
{
    private $beerValidation =  [
        'name'  => 'required|max:40',
        'brand' => 'required|max:40',
        'style' => 'required|max:30',
        'alcohol_content'  => 'required|numeric',
        'price' => 'required|numeric'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("beers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate(
            [
                'name'  => 'required|max:40',
                'brand' => 'required|max:40',
                'style' => 'required|max:30',
                'alcohol_content'  => 'required|numeric',
                'price' => 'required|numeric'
        ]);

        $beer = new Beer();
        $beer->fill($data);
        $result = $beer->save();

        $newBeer = Beer::orderBy('id', 'DESC')->first();
        return redirect()->route('beers.show', $newBeer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    {
        return view('beers.show', compact('beer'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        return view('beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {
        $data = $request->all();
        $request->validate(
        [
            'name'  => 'required|max:40',
            'brand' => 'required|max:40',
            'style' => 'required|max:30',
            'alcohol_content'  => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        $beer->update($data);
        /* dd($beer); */
        return redirect()
        ->route('beers.index')
        ->with('message', 'La birra '. $beer->name .  ' è stata modificata correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();
        /* dd($beer); */
        return redirect()
        ->route('beers.index')
        ->with('message', 'La birra '. $beer->name .  ' è stata cancellata correttamente!');
    }
}
