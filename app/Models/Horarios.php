<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;
    // codRes Number(8) NOT NULL, 
    // dia_semana Char(1) NOT NULL, 
    // hora_apertura Date NOT NULL,
    // hora_cierre Date NOT NULL,
    // CONSTRAINT pk_Hora PRIMARY KEY(codRes, dia_semana),
    // CONSTRAINT fk_Horarios FOREIGN KEY(codRes) REFERENCES Restaurantes(codigo)
    public $timestamps = false;
    protected $fillable = [
        'codRes',
        'dia_semana',
        'hora_apertura',
        'hora_cierre',
    ];
}
