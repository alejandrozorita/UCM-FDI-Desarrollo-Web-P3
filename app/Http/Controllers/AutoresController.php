<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Controllers
//Controllers
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;

//Repositories
use App\Repositories\UserRepo;

//Models
use App\Models\Noticias;

use Auth;

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
        $this->middleware('auth');
        $this->noticiasController = $noticiasController;
        $this->categoriasController = $categoriasController;
        $this->userRepo = $userRepo;

    }




    /**
     * Mostramos la página privada del autor
     */
    public function index_autor(Request $request)
    {

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        $datos_vista['noticias_autor'] = $this->noticiasController->get_todas_noticias_autor_paginado(Auth::id(),10);
    
        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de borrado ok
        if (isset($request->creada)) {
            $datos_vista['mensaje_success'] = 'Noticia creada correctamente';
        }
        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de borrado ok
        if (isset($request->borrada)) {
            $datos_vista['mensaje_success'] = 'Noticia borrada correctamente';
        }

        return view('autor.index',compact('datos_vista'));
    }



    /**
     * Mostramos la para crear noticias
     */
    public function noticia_nueva(Request $request)
    {
        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        return view('autor.noticias.nueva',compact('datos_vista'));
    }


    /**
     * Método del autor para crear una noticia
     */
    public function noticia_nueva_post(Request $request)
    {
        $noticia = $this->noticiasController->nueva_noticia($request,Auth::id());

        if ($noticia[0]) {
            return redirect()->route('index_autor','creada=1');
        }

        return redirect()->back()->withErrors($noticia[1])->withInput();
    }



    /**
     * Muestra la vista de la noticia
     */
    public function editar_noticia(Request $request, $noticia_id = null)
    {
        $datos_vista['noticia'] = Noticias::find($request->noticia_id);

        if (!$datos_vista['noticia']) {
            return redirect()->back()->withErrors('No se ha selecionado una noticia válida');
        }

        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        //Verificamos si la carga de la pagina es tras crear un autor para mostrar mensaje de creado ok
        if (isset($request->editada)) {
            $datos_vista['mensaje_success'] = 'Noticia editado correctamente';
        }

        return view('autor.noticias.editar',compact('datos_vista'));
    }




    /**
     * Editar autor
     */
    public function editar_noticia_post(Request $request)
    {

        $noticia = $this->noticiasController->editar_noticia($request,Auth::id());

        if ($noticia[0]) {
            return redirect()->route('editar_noticia',[$request->noticia_id ,'editada=1']);
        }

        return redirect()->back()->withErrors($noticia[1])->withInput();
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
            'imagen_autor' => 'dimensions:min_width=100,min_height=100'
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