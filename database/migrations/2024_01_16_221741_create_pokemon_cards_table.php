<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pokemon_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedSmallInteger('hp')->comment('Representa la salud de los Pokémon y siempre es un múltiplo de 10');
            $table->boolean('is_first_edition');
            $table->enum('expansion', ['Base Set', 'Jungle', 'Fossil', 'Base Set 2']);
            $table->enum('type', ['Agua', 'Fuego', 'Hierba', 'Eléctrico']);
            $table->enum('rarity', ['Común', 'No Común', 'Rara']);
            $table->decimal('price', 8, 2);
            $table->string('image_url');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_cards');
    }
};
