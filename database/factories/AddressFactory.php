<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label'        => fake()->word(), 'street' => fake()->streetName(),
            'number'       => fake()->buildingNumber(),
            'complement'   => fake('pt_BR')->region(),
            'neighborhood' => fake()->shuffleString('bairro'),
            'city'         => fake('pt_BR')->city(),
            'uf'           => fake()->stateAbbr(), 'cep' => fake()->postcode()
        ];
    }
}
