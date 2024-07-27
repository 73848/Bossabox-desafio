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

    protected $table = 'tag';
    public $timestamps = false;

    public function tags(){
        return $this->belongsToMany(Tags::class);
    }

}
