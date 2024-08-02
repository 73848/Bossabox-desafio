<?php

namespace App\Http\Controllers;

use App\Http\Resources\FerramentasResource;
use Illuminate\Http\Request;
use App\Models\Ferramentas;
class FerramentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $ferramentas = Ferramentas::with('tags')->paginate(10); // recuperando as ferramentas com as tags associadas
       //  return response()->json(['ferramentas'=>$ferramentas], 200);
       return  FerramentasResource::collection($ferramentas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $tag )
    {
        $ferramentas = Ferramentas::with('tags')->whereHas('tags', function ($q) use ($tag){
            $q->where('name', $tag);
        })->paginate(5);
       
       return FerramentasResource::collection($ferramentas);
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
