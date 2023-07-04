<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    // DNI CHAR(9) NOT NULL,
    // nombre VARCHAR(20) NOT NULL,
    // apellido VARCHAR(20) NOT NULL,
    // calle VARCHAR(20) NULL,
    // numero NUMBER(4) NULL,
    // piso VARCHAR(5) NULL,
    // localidad VARCHAR(15) NULL,
    // codigoPostal VARCHAR(5) NULL,
    // telefono VARCHAR(9) NULL,
    // usuario VARCHAR(8) NOT NULL,
    // contraseña VARCHAR(8) DEFAULT ' Nopass ',
    // CONSTRAINT pk_Clientes PRIMARY KEY(DNI),
    // CONSTRAINT un_Usuario UNIQUE(usuario)

    public $timestamps = false;
    protected $primaryKey = 'DNI';
    protected $fillable = [
        //'DNI',
        'nombre',
        'apellido',
        'calle',
        'numero',
        'piso',
        'localidad',
        'codigoPostal',
        'telefono',
        'usuario',
        'contraseña',
    ];

}
