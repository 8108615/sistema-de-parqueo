<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $table = 'facturacions';
    protected $fillable = [
        'ticket_id',
        'usuario_id',
        'nro_factura',
        'nombre_cliente',
        'nro_documento',
        'placa',
        'detalle',
        'monto',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
