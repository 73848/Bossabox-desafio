<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferramentas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'descriptions',
        'link',
        'tags'
    ];

    protected $table = 'ferramentas';
    public $timestamps = false;

    public function tags(){
        return $this->belongsToMany(Tags::class );
    }

}
