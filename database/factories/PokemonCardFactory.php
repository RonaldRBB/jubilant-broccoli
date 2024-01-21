<?php

namespace Database\Factories;

use App\Models\PokemonCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonCardFactory extends Factory
{
    protected $model = PokemonCard::class;
    /**
     * Define the model's default state.
     * 
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'hp' => $this->faker->numberBetween(1, 10) * 10,
            'is_first_edition' => $this->faker->boolean,
            'expansion' => $this->faker->randomElement(['Base Set', 'Jungle', 'Fossil', 'Base Set 2']),
            'type' => $this->faker->randomElement(['Agua', 'Fuego', 'Hierba', 'Eléctrico']),
            'rarity' => $this->faker->randomElement(['Común', 'No Común', 'Rara']),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'image_url' => $this->faker->url,
        ];
    }
}
