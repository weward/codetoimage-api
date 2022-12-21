<?php

namespace Database\Factories;

use App\Models\CodeStyle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CodeStyle>
 */
class CodeStyleFactory extends Factory
{
    protected $model = CodeStyle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'active' => 1,
        ];
    }

    /**
     * Indicate that the model's status should be inactive
     */
    public function inactive()
    {
        return $this->state(fn () => [
            'active' => 0,
        ]);
    }

}
