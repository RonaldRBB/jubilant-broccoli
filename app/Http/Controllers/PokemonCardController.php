<?php

namespace App\Http\Controllers;

use App\Models\PokemonCard;
use Illuminate\Http\Request;

class PokemonCardController extends Controller
{
    private const PAGE_SIZE = 10;
    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $filters = (new PokemonCard)->getFillable();
        $query = PokemonCard::query();
        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $this->applyFilter($query, $filter, $request->input($filter));
            }
        }
        $result = $query->paginate(self::PAGE_SIZE);
        return $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Models\PokemonCard
     */
    public function store(Request $request)
    {
        return PokemonCard::create(PokemonCard::validateRequest($request));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PokemonCard $pokemonCard
     * @return \App\Models\PokemonCard
     */
    public function show(PokemonCard $pokemonCard)
    {
        return $pokemonCard;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PokemonCard $pokemonCard
     * @return \App\Models\PokemonCard
     */
    public function update(Request $request, PokemonCard $pokemonCard)
    {
        $pokemonCard->update(PokemonCard::validateRequest($request));
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
        return response()->json(['message' => 'Record deleted successfully.']);
    }
}
