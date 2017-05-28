<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Controllers
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;

//Repositories
use App\Repositories\UserRepo;

class AutoresController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoticiasController $noticiasController, CategoriasController $categoriasController,
                                UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;

    }



    /**
     * Devovemos todos los autores paginados
     */
    public function get_todos_autores_paginado($paginacion)
    {
        return $this->userRepo->get_todos_autores_paginado($paginacion);
    }


    /**
     * Devolvemos todos los autores
     */
    public function get_todos_autores()
    {
        return $this->userRepo->get_todos_autores();
    }


    /**
     * Metodo para verificar los datos de un nuevo autor
     */
    public function validar_update_autor($request)
    {   
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users,email,'.$request['user_id'].'id',
            'imagen-autor' => 'dimensions:min_width=100,min_height=100'
        ];

        if (!is_null($request['password'])) {
            $rules = ['password' => 'min:6|confirmed'];
        }

        return Validator::make($request, $rules);
    }



    /**
     * Método para actualizar imagen a cada autor
     */
    public function actualizar_imagen($imagen_autor, $user)
    {
        $nombre_imagen = $user->id . '.' .$imagen_autor->getClientOriginalExtension();

        $imagen_autor->move(
            base_path() . '/public/autores/perfil/'.$user->id.'/', $nombre_imagen
        );

        return $nombre_imagen;
    }
}