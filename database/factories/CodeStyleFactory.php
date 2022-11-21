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
            'name' => $this->randStyle(),
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

    protected function randStyle()
    {
        $styles = [
            'androidstudio',
            'atom-one-dark',
            'atom-one-light',
            'brogrammer',
            'dracula',
            'eighties',
            'espresso',
            'github',
            'material-darker',
            'material-lighter',
            'material-palenight',
            'material',
            'monokai',
            'onedark',
            'stackoverflow-dark',
            'stackoverflow-light',
        ];

        return $styles[rand(0, (count($styles) - 1))];
    }
}
