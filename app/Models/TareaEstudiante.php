<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaEstudiante extends Model
{
    protected $fillable = ['estudiante','tarea_id','estado'];
    public function estudiantes()
    {
        return $this->belongsTo(Tarea::class,'tarea_id');
    }
}
