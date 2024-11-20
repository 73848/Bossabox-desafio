<?php

namespace App\Http\Controllers;

use App\Http\Resources\FerramentasResource;
use Illuminate\Http\Request;
use App\Models\Ferramentas;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;

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
        try{ 
            $ferramentas = new Ferramentas();

            # Salvando a ferramenta
            $ferramentas->title = $request->title;
            $ferramentas->link = $request->link;    
            $ferramentas->description = $request->description;   
            $ferramentas->save($request->only(['title', 'link','description']));
            # Salvando as tags associadas aa ferramenta
            $tags = [];
            foreach($request->tags as $tagName){
                $tag = Tags::firstOrCreate(['name'=>$tagName]);
                 $tags[] = $tag->id;
                $name = $tagName;
                }
            $ferramentas->tags()->attach($tags); 
            
            $controller = new FerramentasController();
            return $controller->show($name, true);
        }catch(\Exception $e){
            return response()->json(['error'=>'Erro ao salvar ferramenta ', $e], 500);
        }
        
    }

    public function show(string $tag, bool $OnlyOne=false )
    {
        # Tive que colocar esse if pois uso a funcao show() na funcao store e preciso retornar apenas um elemento nela
        if ($OnlyOne) {
            $ferramentas = Ferramentas::with('tags')
            ->whereHas('tags', function ($q) use ($tag){
                $q->where('name', $tag);
            })
            ->paginate(1);
        }else{
            $ferramentas = Ferramentas::with('tags')
            ->whereHas('tags', function ($q) use ($tag){
                $q->where('name', $tag);
            })
            ->paginate(5);
        }
        return FerramentasResource::collection($ferramentas);
    }
   
  
    public function destroy(string $id)
    {
        //
    }
}
