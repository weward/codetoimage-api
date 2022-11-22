<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $max = 'now';
        $date = fake()->date('Y-m-d', $max);
        $time = fake()->time('H:i:s', $max);
        $dateTime = "{$date} {$time}";

        return [
            'user_id' => 1,
            'code' => fake()->randomHtml(2, 3),
            'title' => fake()->domainWord(),
            'style_id' => rand(252, 326),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
    }
}
