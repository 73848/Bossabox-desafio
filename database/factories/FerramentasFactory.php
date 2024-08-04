<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ferramentas>
 */
class FerramentasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>fake()->unique()->numerify(),
            'title'=>strtolower(fake()->unique()->randomElement(['FastFy', 'json-server', 'servico em nuvem', 'processamento paralelo', 'Notion', 'Github', 'Ias generativas', 'Microsoft Excel', 'Desenvolvimento de Software', 'Dev c#', 'Vaga para gringa'])),
            'link'=>fake()->url(),
            'description'=>fake()->sentence(6)
        ];
    }
}
