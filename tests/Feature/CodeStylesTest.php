<?php

namespace Tests\Feature;

use App\Models\CodeStyle;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        
        $response = $this->getJson('api/get-code-styles');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) => $json->has('data'));
        $response->assertJsonCount(3, 'data');
    }

}
