<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ferramentas_tags', function(Blueprint $table){
            // garantindo a integridade das relacoes
            $table->foreignId('ferramenta_id')->references('id')->on('ferramentas')->onDelete('cascade');
            $table->foreignId('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        }
            
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
