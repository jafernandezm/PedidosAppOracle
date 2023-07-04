<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    // codigo NUMBER(8) NOT NULL,
    // estado CHAR(9) DEFAULT 'REST' NOT NULL,
    // fecha_hora_pedido DATE NOT NULL,
    // fecha_hora_entrega DATE,
    // importe_total NUMBER(8,2),
    // cliente CHAR(9) NOT NULL,
    // codigodescuento NUMBER(8),

    protected $primaryKey = 'codigo';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'estado',
        'fecha_hora_pedido',
        'fecha_hora_entrega',
        'importe_total',
        'cliente',
        'codigodescuento',
    ];
}
