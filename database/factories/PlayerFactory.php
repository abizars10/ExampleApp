<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            // 'slug' => Str::slug($name),
            'position' => $this->faker->randomElement(['goalkeeper', 'center-back', 'left-back', 'right-back', 'left-wing-back', 'right-wing-back', 'sweeper', 'central-midfielder', 'defensive-midfielder', 'attacking-midfielder', 'left-midfielder', 'right-midfielder', 'box-to-box-midfielder', 'deep-lying-playmaker', 'wide-playmaker', 'striker', 'center-forward', 'second-striker', 'left-winger', 'right-winger', 'false-nine', 'target-man', 'poacher', 'inside-forward']),
            'national' => $this->faker->country,
        ];
    }
}
