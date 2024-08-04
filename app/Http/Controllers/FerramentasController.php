<?php

namespace App\Http\Controllers;

use App\Http\Resources\FerramentasResource;
use Illuminate\Http\Request;
use App\Models\Ferramentas;
use App\Models\Tags;

class FerramentasController extends Controller
{
    public function index()
    {
        $ferramentas = Ferramentas::with('tags')->paginate(10); // recuperando as ferramentas com as tags associadas
       //  return response()->json(['ferramentas'=>$ferramentas], 200);
       
       return  FerramentasResource::collection($ferramentas);

    }

    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|string|max:255',
            'link'=> 'required|url|max:255',
            'descriptions' => 'required|string|max:255',
            'tags'=> 'required|array',
            'tags.*.*' => 'required|distinct|max:255'
        ]);



        $ferramentas = Ferramentas::create($request->only(['title', 'link', 'descriptions']));

        $tags = [];

        foreach($request->input('tags') as $tagName){
            $tag = Tags::firstOrCreate(['name'=>$tagName])->id;
            $tags[] = $tag;
        }

        $ferramentas->tags()->attach($tags);
        dd($ferramentas->load('tags'));
        return response()->json($ferramentas->load('tags'), 201);

    }

    public function show(string $tag )
    {
        $ferramentas = Ferramentas::with('tags')
        ->whereHas('tags', function ($q) use ($tag){
            $q->where('name', $tag);
        })
        ->paginate(5);
       
       return FerramentasResource::collection($ferramentas);
    }
   
  
    public function destroy(string $id)
    {
        //
    }
}
