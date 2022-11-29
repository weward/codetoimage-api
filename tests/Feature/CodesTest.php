<?php

namespace Tests\Feature;

use App\Models\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CodesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Store a new Code record
     * 
     * @test
     */
    public function codeSavingWasSuccessful()
    {
        $response = $this->post(route('code.store'), [
            'title' => 'This is the title',
            'code' => 'This is a test code',
            'style_id' => 261
        ]);

        $response->assertStatus(200);
    }

    /**
     * Store a new Code record failed
     * 
     * @test
     */
    public function codeSavingValidationFailed()
    {
        $response = $this->post(route('code.store'), [
            'title' => '',
            'code' => '',
            'style_id' => null
        ]);

        $response->assertStatus(422);
    }

    /**
     * Get All codes working
     * @test
     */
    public function getAllCodesSuccessful()
    {
        $codes = Code::factory()->count(3)->create();

        $response = $this->get(route('code.index'));

        $response->assertJsonCount(3);
    }

    /**
     * @test
     */
    public function getAllCodesFormattedProperly()
    {
        $codes = Code::factory()->count(3)->create();

        $response = $this->get(route('code.index'));

        $response->assertJson(fn (AssertableJson $json) => $json->has('data'));
    }
    
    /**
     * Get Specific Entity record
     * 
     * @test
     */
    public function getSpecificCodeRecordSuccessful()
    {
        Code::factory()->count(1)->create();

        $response = $this->get(route('code.view', ['code' => 1]));

        $response->assertJsonFragment([
            'id' => 1,
        ]);
    }



}
