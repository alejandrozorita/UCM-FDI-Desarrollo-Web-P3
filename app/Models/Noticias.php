<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
	protected $table = 'noticias';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'extracto','contenido','publicada','user_id','categoria_id',
    ];


    //Relación 1:1 entre noticias y categorias
    public function categoria(){
        return $this->hasOne('App\Models\Categorias', 'categoria_id', 'id');
    }

    //Relacion 1:n entre noticias y comentarios
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentarios','noticia_id','id');
    }

    //Relación N:1 entre noticias y autor
    public function autor(){
        return $this->belongsTo('App\Models\Noticias','id','noticia_id');
    }
}
