<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tags;
use App\Models\Ferramentas;
class FerramentasTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     foreach(Ferramentas::all() as $ferramenta){
        $tags = Tags::inRandomOrder()->take(1,5)->pluck('id')->toArray();
        $ferramenta->tags()->attach($tags);
     }   
    }
}

