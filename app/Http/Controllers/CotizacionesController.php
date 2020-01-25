<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // session()->forget('usuario');
        // session()->forget('plaza');

        if(!session()->has('usuario') || !session()->has('plaza')) 
        {
            // return \Redirect::route('ingresar'); 
        }
        echo 'Hola aqui';
        // return view('cotizaciones.index');
    }

    public function nuevoPresupuesto(Request $request)
    {
        // dd($request->all());
        $usuario = session('usuario');
        $plaza = session('plaza');
        $serie = session('serie');
        $nombre_usuario = session('nombre_usuario');
        $fecha_actual = new \DateTime();
        $fecha_actual = $fecha_actual->format('Y-m-d');

        $datos_cotizacion = $this->validate(request(), [
                    'FechaProbServ' => 'required|max:20',
                    'mensaje' => 'string|max:50',
                    'FolioCliente' => 'string',
                    'DireccionOrigen' => 'string|required',
                    'NombreQuienRecibe' => 'string|required|max:30',
                    'DireccionDestino' => 'string|required',
                    'TipoMud' => 'string|required',
                    
                ]);
        
        $CvePlaza = $plaza; //as varchar(3),//se obtene de la varibale sesion
        $Serie = $serie; //as varchar(1),//se obtiene de la variable sesion
        $FechaCot = $fecha_actual; //as varchar(20), se obtiene de la fecha actual
        $FechaProbServ = $datos_cotizacion['FechaProbServ']; //as varchar(20),
        $Mensaje = $datos_cotizacion['mensaje']; //as varchar(50),
        $UsuarioCot = $usuario; //as varchar(50),se obtiene de la varible de sesion
        $FolioCliente =$datos_cotizacion['FolioCliente']; //as numeric,
        $Usuario = $usuario; //as varchar(10), //se obtiene del login
        $NombreQuienCotiza = $nombre_usuario; //as varchar(30),
        $DireccionOrigen = $datos_cotizacion['DireccionOrigen']; //as varchar(50),
        $NombreQuienRecibe = $datos_cotizacion['NombreQuienRecibe']; //as varchar(30),
        $DireccionDestino = $datos_cotizacion['DireccionDestino']; //as varchar(50),
        $TipoPresup = 0; //as varchar(1),
        $TipoMud = $datos_cotizacion['TipoMud']; //as varchar(1)

        $results = DB::update("exec SPNuevoPresupuesto '".$CvePlaza."', '".$Serie."', '".$FechaCot."', '". $FechaProbServ."', '". $Mensaje."', '". $UsuarioCot."', ". $FolioCliente.", '". $Usuario."', '". $NombreQuienCotiza."', '". $DireccionOrigen."', '". $NombreQuienRecibe."', '". $DireccionDestino."', '". $TipoPresup."', '". $TipoMud."'");
        return \Redirect::route('cotizaciones')
        ->with('message', 'La cotizacion se guardo de forma correcta');


    }
}
