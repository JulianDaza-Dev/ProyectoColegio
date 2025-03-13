<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['profesor','titulo','descripcion','estudiantes','fecha_entrega'];
    public function estudiantes()
    {
        return $this->hasMany("tarea_estudiantes");
    }
}
