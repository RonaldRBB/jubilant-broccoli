<?php

namespace Tests\Feature;

use App\Models\PokemonCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use App\Models\User;

class PokemonCardControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function it_can_list_pokemon_cards()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $pokemonCards = PokemonCard::factory()->count(5)->create();
        $response = $this->getJson(route('pokemon-cards.index'));
        $response->assertStatus(200)->assertJsonCount(5, 'data');
    }
    /** @test */
    public function it_can_show_a_single_pokemon_card()
    {
        $pokemonCard = PokemonCard::factory()->create();
        $response = $this->getJson(route('pokemon-cards.show', $pokemonCard));
        $response->assertStatus(200)->assertJson($pokemonCard->toArray());
    }
    /** @test */
    public function it_can_store_a_new_pokemon_card()
    {
        $data = PokemonCard::factory()->raw();
        $response = $this->postJson(route('pokemon-cards.store'), $data);
        $response->assertStatus(201)->assertJson($data);
        $this->assertDatabaseHas('pokemon_cards', $data);
    }
    /** @test */
    public function it_validates_required_fields_when_storing_a_pokemon_card()
    {
        $response = $this->postJson(route('pokemon-cards.store'));
        $response->assertStatus(422)->assertJsonValidationErrors($this->get_fillable());
    }
    /** @test */
    public function it_can_update_an_existing_pokemon_card()
    {
        $pokemonCard = PokemonCard::factory()->create();
        $updatedData = PokemonCard::factory()->raw();
        $response = $this->putJson(route('pokemon-cards.update', $pokemonCard), $updatedData);
        $response->assertStatus(200)->assertJson($updatedData);
        $this->assertDatabaseHas('pokemon_cards', $updatedData);
    }
    /** @test */
    public function it_validates_required_fields_when_updating_a_pokemon_card()
    {
        $pokemonCard = PokemonCard::factory()->create();
        $response = $this->putJson(route('pokemon-cards.update', $pokemonCard));
        $response->assertStatus(422)
            ->assertJsonValidationErrors($this->get_fillable());
    }
    /** @test */
    public function it_can_delete_a_pokemon_card()
    {
        $pokemonCard = PokemonCard::factory()->create();
        $response = $this->deleteJson(route('pokemon-cards.destroy', $pokemonCard));
        $response->assertStatus(200)->assertJson(['message' => 'Record deleted successfully.']);
        $this->assertDatabaseMissing('pokemon_cards', ['id' => $pokemonCard->id]);
    }
    private function get_fillable()
    {
        return array_diff((new PokemonCard)->getFillable(), ['created_at']);
    }
}
