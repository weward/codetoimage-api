<?php

namespace Tests\Feature;

use App\Models\CodeStyle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CodeStylesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function getCodeStylesSuccessful()
    {
        CodeStyle::factory()->count(3)->create();
        
        $this->assertDatabaseCount('code_styles', 3);

        $response = $this->getJson(route('code-style.index'));

        $response->assertJson(fn (AssertableJson $json) => $json->has('data', 3));
    }

    /**
     * @test
     */
    public function getCodeStylesFormattedProperly()
    {
        CodeStyle::factory()->count(3)->create();

        $this->assertDatabaseCount('code_styles', 3);

        $response = $this->getJson(route('code-style.index'));

        $response->assertJson(fn (AssertableJson $json) => $json->has('data'));
    }

}
