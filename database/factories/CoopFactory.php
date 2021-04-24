<?php

namespace Database\Factories;

use App\Models\Coop;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => \App\Models\Brand::factory(),
            'name' => $this->faker->word,
            'expiration_date' => now()->addWeeks(2),
            'goal' => $this->faker->randomFloat(2, 1000, 1000000),
        ];
    }
}
