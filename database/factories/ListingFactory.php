<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => fake()->jobTitle(),
            'salary'      => '25000',
            'tags'        => 'laravel, vuejs, reactjs, api',
            'company'     => fake()->company(),
            'logo'        => '',
            'location'    => fake()->address(),
            'email'       => fake()->email(),
            'website'     => fake()->url(),
            'description' => fake()->paragraph(5)
        ];
    }
}
