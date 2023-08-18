<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalResponsable extends Model
{
    protected $table = 'personal_asistencial'; // Nombre de la tabla en la base de datos

    protected $fillable = ['Numero_identificacion_personal','Apellidos_personal', 'Nombres_personal', 'activo']; // Campos que se pueden llenar

    // Definir relación con Evento si existe
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'personal_responsable_id');
    }
}