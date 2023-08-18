<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio'; // Nombre de la tabla en la base de datos

    protected $fillable = ['Codigo_servicio','Servicio', 'activo']; // Campos que se pueden llenar

    // Definir relación con Evento si existe
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'servicio_id');
    }
}