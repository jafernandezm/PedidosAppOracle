<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo';
    public $timestamps = false;


    //codigo, nombre , calle ,codigo_postal, comision
    protected $fillable = [
        'codigo',
        'nombre',
        'calle',
        'codigo_postal',
        'comision',
    ];
    
}
