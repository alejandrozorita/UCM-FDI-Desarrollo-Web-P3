<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;


//Controller
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AutoresController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoriasController $categoriasController, AutoresController $autoresController)
    {
        //$this->middleware('guest');
        $this->autoresController = $autoresController;
        $this->categoriasController = $categoriasController;
        $this->redirectTo = route('nuevo_autor','creado=1');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {   
        $datos_vista['categorias'] = $this->categoriasController->get_todas_categorias();

        return view('auth.register',compact('datos_vista'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'imagen_autor' => 'required|dimensions:min_width=100,min_height=100',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'imagen' => '',
            'rol' => 'autor',
        ]);

        $user->imagen = self::autor_imagen($data['imagen_autor'], $user);

        $user->save();

        return $user;
    }


    /**
     * Método para actualizar imagen a cada autor
     */
    private function autor_imagen($imagen_autor, $user)
    {
        return $this->autoresController->actualizar_imagen($imagen_autor, $user);
    }




    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
