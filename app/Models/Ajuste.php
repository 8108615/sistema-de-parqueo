<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $table = 'ajustes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'sucursal',
        'direccion',
        'telefonos',
        'logo',
        'logo_auto',
        'divisa',
        'correo',
        'pagina_web',
    ];
}
