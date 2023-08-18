<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CentroAtencion;
use App\Models\PersonalResponsable;
use App\Models\Servicio;

class Evento extends Model
{
    protected $table = 'Registro_eventos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'Numero_registro',
        'Fecha_evento',
        'Descripcion_suceso',
        'Activo',
        'Codigo_Servicio',
        'Fecha_accion_correctiva',
        'Codigo_Centro',
        'Numero_identificacion_personal'
    ];

    public function centroAtencion()
    {
        return $this->belongsTo(CentroAtencion::class, 'codigo_centro', 'Codigo_Centro');
    }

    public function personalResponsable()
    {
        return $this->belongsTo(PersonalResponsable::class, 'Numero_identificacion_personal');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'Codigo_Servicio');
    }
}