<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticiasFront extends Model
{
	protected $table = 'noticias_front';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noticia_id',
    ];


    //Relación 1:1 entre noticias y categorias
    public function noticia(){
        return $this->hasOne('App\Models\Noticias', 'id', 'noticia_id');
    }
}
