<?php

namespace App\Livewire;

use App\Models\Tarea;
use App\Models\TareaEstudiante;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inicio extends Component
{
    public $profesor;
    public $usuarios;

    public $tareas_pendientes;

    public $estudiante;
    public $tareas_estudiantes;
    public $tareas;
    public function crearEstudiante()
    {
        return to_route("crear-usuario");
    }
    public function crearProfesor()
    {
        return to_route("crear-usuario-profe");
    }
    public function crearTarea()
    {
        return to_route("crear-tarea");
    }
    public function eliminarTarea($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        //return to_route(request()->header(key: "Referer"));
        return to_route("inicio");
    }
    public function entregarTarea($id)
    {
        $tarea = TareaEstudiante::find($id);
        $tarea->estado = 1;
        $tarea->save();
        return to_route("inicio");
    }

    public function mount()
    {
        $this->usuarios = User::all();
        $this->profesor = Auth::user()->id;
        $this->tareas = Tarea::where('profesor',$this->profesor)->get();
        $this->estudiante = Auth::user()->email;
        $this->tareas_pendientes = TareaEstudiante::where('estudiante',operator: $this->estudiante)->where("estado",0)->get();
        $this->tareas_pendientes  = count($this->tareas_pendientes);
        $this->tareas_estudiantes= TareaEstudiante::with('estudiantes')->where('estudiante',$this->estudiante)->get();
    }
    public function render()
    {
        return view('livewire.inicio');
    }
}
