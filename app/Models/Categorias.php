<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
	protected $table = 'categorias';
    //


    //Relación 1:1 entre noticias y categorias
    public function noticias(){
        return $this->hasMany('App\Models\Noticias', 'categoria_id', 'id');
    }
}
