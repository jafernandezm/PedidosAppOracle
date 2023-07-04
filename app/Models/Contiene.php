<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contiene extends Model
{
    use HasFactory;
    // id_plato  Number(8),
    // pedido NUMBER(8),
    // precio_con_comision NUMBER(8,2) NULL,
    // unidades NUMBER(4) NOT NULL,
    // CONSTRAINT pk_contiene PRIMARY KEY (restaura, id_plato, pedido),
    // CONSTRAINT fk_contiene_plato FOREIGN KEY (restaura, id_plato) REFERENCES Platos (resCod, id_plato) ON DELETE CASCADE,
    // CONSTRAINT fk_contiene_pedido FOREIGN KEY (pedido) REFERENCES Pedidos (codigo) ON DELETE CASCADE
    public $timestamps = false;
    protected $fillable = [
        'id_plato',
        'pedido',
        'precio_con_comision',
        'unidades',
    ];


    
}
