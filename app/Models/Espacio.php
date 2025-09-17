<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $table = 'espacios';

    protected $fillable = [
        'numero',
        'estado',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
