<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasCobertura extends Model
{
    use HasFactory;
    // codigoRes Number(8) NOT NULL, 
    // codigoPostal Char(5) NOT NULL,
    // CONSTRAINT pk_areas PRIMARY KEY(codigoRes, codigoPostal),
    // CONSTRAINT fk_areas FOREIGN KEY(codigoRes) REFERENCES Restaurantes(codigo)

    public $timestamps = false;
    protected $fillable = [
        'codigoRes',
        'codigoPostal',
    ];

    
}
