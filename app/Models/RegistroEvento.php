<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegistroEvento extends Model
{
    protected $table = 'registro_eventos';

    public static function consulta($filtros)
    {
        return DB::table('registro_eventos')
            ->select('Numero_registro', 'Fecha_evento', 'Descripcion_suceso', 'Fecha_accion_correctiva', 'centro_de_atencion', 'Activo')
            ->join('Servicio', 'registro_eventos.Codigo_Servicio', '=', 'Servicio.Codigo_servicio')
            ->join('centros_de_atencion', 'registro_eventos.codigo_centro', '=', 'centros_de_atencion.codigo_centro')
            ->where('Codigo_Servicio', 'like', '%' . $filtros['Servicio'] . '%')
            ->where('Numero_identificacion_personal', 'like', '%' . $filtros['Responsable'] . '%')
            ->where('codigo_centro', 'like', '%' . $filtros['Centro'] . '%')
            ->whereBetween('Fecha_Evento', [$filtros['Fecha_Inicio'], $filtros['Fecha_Fin']])
            ->orderBy('Numero_registro')
            ->get();
    }
}