<?php

namespace App\Http\Controllers;
use App\CatUsuarios;
use App\CatPlazas;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $plazas = CatPlazas::all()->where('Baja', '=',0);
        return view('login.index',compact('plazas'));
    }

    // Login de usuario
    public function login(Request $request)
    {
        $request->flashOnly(['usuario', 'plaza']);
        $credenciales = $this->validate(request(), [
            'usuario' => 'required|string',
            'password' => 'required|string',
            'plaza' => 'required|max:3'
        ]);

        $usuario = $credenciales['usuario'];
        $password = $credenciales['password'];
        $plaza =  $credenciales['plaza'];
        $serie = '';
        $nombre_usuario='';
        $datos_login = CatUsuarios::all()->where('cve_usuario', '=',$usuario)
                                            ->where('password','=',$password)
                                            ->where('plaza','=',$plaza)
                                            ->where('baja','=',0);
        
        foreach ($datos_login as $dato)
        {
            $serie = $dato->Serie;
            $nombre_usuario = $dato->nombre_usuario;
        }

        if($datos_login->isNotEmpty())
        {
            session(['usuario' => $usuario,
                    'plaza' => $plaza,
                    'serie' => $serie,
                    'nombre_usuario' => $nombre_usuario]);
                    echo 'Serie: '.$serie;
            return \Redirect::route('cotizaciones');       
        }
        else {
            $request->flashExcept(['usuario', 'plaza']);
            return \Redirect::route('ingresar')
                 ->with('message', 'Los datos ingresados son incorrectos, por favor verifique la información');
        }
        


    }
}
