<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
	protected $table = 'comentarios';
    //

	//Relación 1:1 comentarios que pertenecen a noticia
    public function noticia(){
        return $this->belongsTo('App\Models\Noticias','noticia_id','id');
    }

}
