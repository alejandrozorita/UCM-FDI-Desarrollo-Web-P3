<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Repositories
use App\Repositories\ComentariosRepo;

//Models
use App\Models\Noticias;
use App\Models\Comentarios;

use Cache;

class ComentariosController extends Controller
{
    
	public function __construct(ComentariosRepo $comentariosRepo)
    {   
        Cache::flush();
        //$this->middleware('auth');
        $this->comentariosRepo = $comentariosRepo;
    }


    /**
     * Creamos un nuevo comentario
     */
    public function nuevo_comentario(Request $request)
    {
    	$validate = self::validar_comentario_noticia($request->all());

    	if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput();
        }

        //Asigamos el comentario la noticia correspondiente
        $comentario = new Comentarios($request->all());

        $noticia = Noticias::find($request->noticia_id);

		$noticia->comentarios()->save($comentario);

        return redirect()->route('leer_noticia',[$noticia->slug,'comentario_creado=1']);

    }



    /**
     * Metodo para verificar los datos de del comentario de la noticia
     */
    private function validar_comentario_noticia($request)
    {   
        $rules = [
            'texto' => 'required|max:191|min:3'
        ];

        return Validator::make($request, $rules);
    }
}
