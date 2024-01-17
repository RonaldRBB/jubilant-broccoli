<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
