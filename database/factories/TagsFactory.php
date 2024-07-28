<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tags>
 */
class TagsFactory extends Factory
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
                'name'=>fake()->randomElement(['PHP', 'Node', 'Java', 'Laravel', 'PHP Faker', 'Composer', 'json', 'http2', 'api', 'web', 'rest']),
        ];
    }
}
