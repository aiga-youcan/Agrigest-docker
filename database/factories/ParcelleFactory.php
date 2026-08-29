<?php

namespace Database\Factories;

use App\Models\Parcelle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'culture' => $this->faker->randomElement([
                'Blé',
                'Maïs',
                'Tomate',
                'Olivier',
                'Pomme de terre'
            ]),
            'superficie' => $this->faker->randomFloat(2, 1, 100),
            'date_plantation' => $this->faker->date(),
            'statut' => $this->faker->randomElement([
                'En culture',
                'Récoltée',
                'Préparation'
            ]),
        ];
    }
}
