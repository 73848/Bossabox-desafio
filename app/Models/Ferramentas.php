<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferramentas extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descriptions',
        'tags'
    ];

    protected $table = 'ferramentas';

    public function tags(){
        return $this->belongsToMany(Tags::class );
    }

}
