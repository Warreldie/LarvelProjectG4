<?php

namespace Database\Factories;

use App\Models\Nft;
use Illuminate\Database\Eloquent\Factories\Factory;

class NftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nft::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->realText(200, 2),
            'collection_id' => $this->faker->numberBetween(1, 4),
            'category_id' => $this->faker->numberBetween(1, 4),
            'picture' => "QmcLF8BJJ7A3qs6ephCCxebeMu3ucZP62xHzZT4NrfkHER",
            'mint_id' => 0,
            'price' => 10.99,
            "Creator_id" => 7,
            "Owner_id" => 7
        ];
    }
}
