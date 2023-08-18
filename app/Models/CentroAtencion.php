<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;

class CentroAtencion extends Model
{

    protected $primaryKey = 'Codigo_Centro';

    protected $table = 'centros_de_atencion'; // Nombre de la tabla en la base de datos

    protected $fillable = ['Codigo_Centro','Centro_de_Atencion', 'Activo']; // Campos que se pueden llenar

    // Definir relación con Evento si existe
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'codigo_centro', 'Codigo_Centro');
    }
}