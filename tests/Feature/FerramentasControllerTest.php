<?php

namespace Tests\Feature;

use App\Http\Controllers\FerramentasController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request as HttpRequest;
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
            'ferramentas'=>[
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
    # preciso de formas de testar a estrutura da resposta
    public function test_show_are_working_corretly(){
        $controller = new FerramentasController();
        $response = $controller->show('node');
        dump($response->getData()->ferramenta[0]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertIsObject($response->getData()->ferramenta[0]);
    }

    public function test_store_function_works_corretly(){
        $input = [
            "title"=> "café da manha",
            "link"=>"https://kutch.net/quos-qui-autem-at.html",
            "description"=> "Iusto mollitia qui ad assumenda et sunt illo.",
            "tags"=>[
              "torrada",
              "cafe",
              "queijo de coalho"
            ]
        ];
        $request = HttpRequest::create('api/ferramentas', 'POST', $input);
        $controller = new FerramentasController();
        $response = $controller->store($request);
        
        $this->assertEquals(200, $response->getStatusCode());

    }
}
