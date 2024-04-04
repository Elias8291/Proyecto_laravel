<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;
    protected $primaryKey = 'numeroDeControl';
    public $incrementing = false; // Asume que 'numeroDeControl' es autoincremental. Cambiar a false si no lo es.
    protected $keyType = 'int';
    public function getRouteKeyName()
    {
        return 'numeroDeControl';
    }


    protected $fillable = ['numeroDeControl', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'semestre'];
}
