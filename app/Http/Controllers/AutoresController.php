<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
}