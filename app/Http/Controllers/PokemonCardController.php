<?php

namespace App\Http\Controllers;

use App\Models\PokemonCard;
use Illuminate\Http\Request;

class PokemonCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PokemonCard::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:pokemon_cards',
            'hp' => 'required|numeric|multiple_of:10',
            'is_first_edition' => 'required|boolean',
            'expansion' => 'required|string|in:Base Set,Jungle,Fossil,Base Set 2',
            'type' => 'required|string|in:Agua,Fuego,Hierba,Eléctrico',
            'rarity' => 'required|string|in:Común,No Común,Rara',
            'price' => 'required|numeric',
            'image_url' => 'required|url',
        ]);

        return PokemonCard::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PokemonCard  $pokemonCard
     * @return \Illuminate\Http\Response
     */
    public function show(PokemonCard $pokemonCard)
    {
        return $pokemonCard;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PokemonCard  $pokemonCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PokemonCard $pokemonCard)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:pokemon_cards',
            'hp' => 'numeric|multiple_of:10',
            'is_first_edition' => 'boolean',
            'expansion' => 'string|in:Base Set,Jungle,Fossil,Base Set 2',
            'type' => 'string|in:Agua,Fuego,Hierba,Eléctrico',
            'rarity' => 'string|in:Común,No Común,Rara',
            'price' => 'numeric',
            'image_url' => 'url',
        ]);

        $pokemonCard->update($validatedData);

        return $pokemonCard;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PokemonCard  $pokemonCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PokemonCard $pokemonCard)
    {
        $pokemonCard->delete();

        return response()->json(['message' => 'Carta eliminada correctamente']);
    }
}
