<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    use HasFactory;

    // id_plato Number(8) NOT NULL,
    // resCod Number(8) NOT NULL,
    // nombrePlato VARCHAR(25) NOT NULL, 
    // precio Number(8,2) NULL, 
    // descripcion VARCHAR(30) NULL, 
    // categoria VARCHAR(20) NULL,
    // CONSTRAINT pk_Platos Primary key (resCod, id_plato),
    // CONSTRAINT fk_Platos FOREIGN KEY(resCod) REFERENCES Restaurantes(codigo)
    public $timestamps = false;
    protected $fillable = [
        'id_plato',
        'resCod',
        'nombrePlato',
        'precio',
        'descripcion',
        'categoria',
    ];
}
