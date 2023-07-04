<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuentos extends Model
{
    use HasFactory;
//     codigodescuento NUMBER(8) NOT NULL,
//  fecha_caducidad DATE NULL,
//  porcentaje_descuento NUMBER(3) NOT NULL,
//  CONSTRAINT pk_descuento PRIMARY KEY (codigodescuento),
//  CONSTRAINT ck_descuento_porcentaje_0_100 CHECK (porcentaje_descuento > 0 AND porcentaje_descuento<=100)

    public $timestamps = false;
    protected $fillable = [
        'codigodescuento',
        'fecha_caducidad',
        'porcentaje_descuento',
    ];
}
