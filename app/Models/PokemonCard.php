<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PokemonCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hp',
        'is_first_edition',
        'expansion',
        'type',
        'rarity',
        'price',
        'image_url',
        'created_at',
    ];
    protected static $validation_rules = [
        'name' => 'required|string|unique:pokemon_cards',
        'hp' => 'required|numeric|multiple_of:10',
        'is_first_edition' => 'required|boolean',
        'expansion' => 'required|string|in:Base Set,Jungle,Fossil,Base Set 2',
        'type' => 'required|string|in:Agua,Fuego,Hierba,Eléctrico',
        'rarity' => 'required|string|in:Común,No Común,Rara',
        'price' => 'required|numeric',
        'image_url' => 'required|url',
    ];
    public static function validateRequest(Request $request)
    {
        return $request->validate(self::$validation_rules);
    }
}
