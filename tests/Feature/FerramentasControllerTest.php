<?php

namespace Tests\Feature;

use App\Http\Controllers\FerramentasController;
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
    public function test_index_are_return_json_format_corretly()
    {
            $this
            ->getJson('api/ferramentas')
            ->assertOk()
            ->assertJsonStructure(
            [
            [   'id',
                'title',
                'description',
                'tags'
            ]
            ]
            
            );
    }
    public function test_show_are_return_json_format_corretly(){
        $controller = new FerramentasController();
        $response = $controller->show('node');
        $this->assertJson($response);
       
    }
}
