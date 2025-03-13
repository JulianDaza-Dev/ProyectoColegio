<?php

namespace App\Livewire;

use App\Models\Tarea;
use App\Models\TareaEstudiante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CrearTarea extends Component
{
    public $titulo;
    public $descripcion;
    public $estudiantes;

    public $profesor;
    public $lista_estudiantes;
    public $fecha_entrega;
    public function save()
    {
        
        $validated = $this->validate([
            "titulo"=> "required",
            "descripcion"=> "required",
            "estudiantes"=> "required",
            "fecha_entrega"=>"required"
        ],
        [
            "titulo.required"=> "TITULO REQUERIDO",
            "descripcion.required"=> "DESCRIPCION REQUERIDA",
            "estudiantes.required"=> "ESTUDIANTES REQUERIDOS",
            "fecha_entrega.required"=> "FECHA REQUERIDA",
        ]);
        $validated['profesor'] = $this->profesor;
        $tarea = Tarea::create($validated);

        $this->lista_estudiantes = explode(",", $this->estudiantes);
        foreach ($this->lista_estudiantes as $key => $value)
        {
            TareaEstudiante::create([
                "estudiante"=> $value,
                "tarea_id"=> $tarea->id,
                "estado"=> 0,
            ]);
        }
        return to_route('inicio');
    }
    public function mount()
    {
        $this->profesor = Auth::user()->id;
    }
    public function render()
    {
        return view('livewire.crear-tarea');
    }
}
