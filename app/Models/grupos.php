<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'id_rango', 'id_horario', 'clave_materia'];

}