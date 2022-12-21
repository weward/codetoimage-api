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

        $response->assertStatus(201);
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
        Code::factory()->count(3)->create();

        $response = $this->getJson(route('code.index'));

        $response->assertJson(fn (AssertableJson $json) => $json->has('data', 3));
    }

    /**
     * Check if list is returning the 
     * proper response key (default = 'data')
     * 
     * @test
     */
    public function getAllCodesHasProperResponseKey()
    {
        Code::factory()->count(3)->create();

        $response = $this->getJson(route('code.index'));

        $response->assertJson(fn (AssertableJson $json) => $json->has('data'));
    }
    
    /**
     * Get Specific Entity record
     * 
     * @test
     */
    public function getSpecificCodeRecordSuccessful()
    {
        $code = Code::factory()->create();

        $response = $this->getJson(route('code.view', ['code' => $code->id]));

        $response->assertJsonFragment([
            'id' => $code->id,
        ]);
    }

    /**
     * Check if Specific Entity record is returning the 
     * proper response key (default = 'data')
     * 
     * @test
     */
    public function getSpecificCodeRecordHasProperResponseKey()
    {
        $code = Code::factory()->create();

        $response = $this->getJson(route('code.view', ['code' => $code->id]));

        $response->assertJson(fn (AssertableJson $json) => $json->has('data'));
    }

    /**
     * Deleted Code Successfully
     * 
     * @test
     */
    public function deletedCodeSuccessfully()
    {
        $code = Code::factory()->create();

        $this->assertDatabaseHas('codes', ['id' => $code->id]);

        $response = $this->deleteJson(route('code.delete', ['code' => $code->id]));

        $this->assertDatabaseMissing('codes', ['id' => $code->id]);

        $this->assertTrue($response->original);
    }

}
