<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FerramentasControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     * php artisan test --filter=FerramentasControllerTest
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_index_are_return_json_corretly()
    {
        $response = $this
            ->getJson('api/ferramentas')
            ->assertOk()
            ->assertJsonStructure(
            [
            'data' => [
                [
                'id',
                'title',
                'description',
                'tags'
                ]
            ]
            ]
            );
    }
}
