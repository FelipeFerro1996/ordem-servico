<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produtos>
 */
class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => 'P' . $this->faker->unique()->numerify('###'),
            'descricao' => $this->faker->words(3, true),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
            'tempo_garantia' => $this->faker->numberBetween(6, 36),
        ];
    }
}
