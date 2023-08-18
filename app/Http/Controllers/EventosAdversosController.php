<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroEvento;
use App\Models\CentroAtencion;
use App\Models\PersonalResponsable;
use App\Models\Servicio;
use App\Models\Evento;

class EventosAdversosController extends Controller
{
    public function index()
    {
        $dia = date('d');
        $mes = date('m');
        $anno = date('Y');
    
        // Obtener datos de la base de datos (centros, personal, servicios)
        $centros = CentroAtencion::where('Activo', 1)->orderBy('Centro_de_Atencion')->get();
        $personal = PersonalResponsable::where('Activo', 1)->orderBy('Nombres_personal')->get();
        $servicios = Servicio::where('activo', 1)->orderBy('Servicio')->get();
        // var_dump($personal);
        // die;
        return view('adr', compact('dia', 'mes', 'anno', 'centros', 'personal', 'servicios'));
    }

    public function consultar(Request $request)
    {
        $Fecha1 = $request->input('Fecha1');
        $Fecha2 = $request->input('Fecha2');
        $Centro = $request->input('Centro');
        $Responsable = $request->input('Responsable');
        $Servicio = $request->input('Servicio');
    
        $eventos = Evento::with('centroAtencion')->where('Fecha_evento', '>=', $Fecha1)
            ->where('Fecha_evento', '<=', $Fecha2);
        if ($Centro) {
            $eventos->where('Codigo_Centro', $Centro);
        }
    
        if ($Responsable) {
            $eventos->where('Numero_identificacion_personal', $Responsable);
        }
    
        if ($Servicio) {
            $eventos->where('Codigo_Servicio', $Servicio);
        }
    
        $eventos = $eventos->with('centroAtencion')->orderBy('Numero_registro')->get();
    
        $centros = CentroAtencion::where('Activo', 1)->orderBy('Centro_de_Atencion')->get();
        $personal = PersonalResponsable::where('Activo', 1)->orderBy('Nombres_personal')->get();
        $servicios = Servicio::where('Activo', 1)->orderBy('Servicio')->get();
    
        return view('adrConsultar', compact('eventos', 'centros', 'personal', 'servicios'));
    }
}
