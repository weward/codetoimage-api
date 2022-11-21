<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CodesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Store a new Code record
     * 
     * @test
     */
    public function storeCodeWasSuccessful()
    {
        $response = $this->post('api/save-code', [
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
    public function storeCodeValidationFailed()
    {
        $response = $this->post('api/save-code', [
            'title' => '',
            'code' => '',
            'style_id' => null
        ]);

        $response->assertStatus(422);
    }

}
