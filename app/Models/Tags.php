<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable= [
        'id',
        'name'
    ];

    protected $table = 'tags';
    public $timestamps = false;

    public function ferramentas(){
        return $this->belongsToMany(Tags::class, 'ferramentas_tags', 'tag_id', 'ferramenta_id');
    }

}
