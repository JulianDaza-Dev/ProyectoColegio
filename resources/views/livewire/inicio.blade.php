<div>
    @can('crear-usuarios-sistema')
        <div style="text-align: center">
            <div style="text-align: center">
                <p>ADMINISTRADOR</p>
            </div>
            <div class="d-grid gap-2" style="margin-bottom: 2%">
                <button class="btn btn-secondary" type="button" wire:click="crearEstudiante">CREAR ESTUDIANTE</button>
                <button class="btn btn-secondary" type="button" wire:click="crearProfesor">CREAR PROFESOR </button>
            </div>
            <table class="table table-dark table-striped">
                <tr>
                    <td>
                        NOMBRE
                    </td>
                    <td>
                        CORREO
                    </td>
                </tr>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>
                        {{$usuario->name}}
                    </td>
                    <td>
                        {{$usuario->email}}
                    </td>
                </tr>
                @endforeach
              </table>
        </div>
    @endcan
    @can('administrar-tareas')
        <div style="text-align: center">
            <div style="text-align: center">
                <p>PROFESOR</p>
            </div>
            <div class="d-grid gap-2" style="margin-bottom: 2%">
                <button class="btn btn-secondary" type="button" wire:click="crearTarea">CREAR TAREA</button>
            </div>
            <table class="table table-dark table-striped">
                <tr>
                    <td>
                        TITULO
                    </td>
                    <td>
                        DESCRIPCION
                    </td>
                    <td>
                        ESTUDIANTES
                    </td>
                    <td>
                        FECHA DE ENTREGA
                    </td>
                    <td>
                        ESTADO
                    </td>
                </tr>
                @foreach ($tareas as $tarea)
                <tr>
                    <td>
                        {{$tarea->titulo}}
                    </td>
                    <td>
                        {{$tarea->descripcion}}
                    </td>
                    <td>
                        {{$tarea->estudiantes}}
                    </td>
                    <td>
                        {{$tarea->fecha_entrega}}
                    </td>
                    <td>
                        <button class="btn btn-danger" wire:click="eliminarTarea({{$tarea->id}})">
                            ELIMINAR
                        </button>
                    </td>
                </tr>
                @endforeach
              </table>
        </div>
    @endcan
    @can('ver-tareas')
        <div style="text-align: center">
            <div style="text-align: center">
                <p>ESTUDIANTE</p>
                <p>TAREAS PENDIENTES: {{$tareas_pendientes}}</p>
            </div>
            <table class="table table-dark table-striped">
                <tr>
                    <td>
                        TITULO
                    </td>
                    <td>
                        DESCRIPCION
                    </td>
                    
                    <td>
                        FECHA DE ENTREGA
                    </td>
                    <td>
                        ESTADO
                    </td>
                </tr>
                @foreach ($tareas_estudiantes as $tareas_estudiante)
                <tr>
                    <td>
                        {{$tareas_estudiante->estudiantes->titulo}}
                    </td>
                    <td>
                        {{$tareas_estudiante->estudiantes->descripcion}}
                    </td>
                    <td>
                        {{$tareas_estudiante->estudiantes->fecha_entrega}}
                    </td>
                    <td>
                        @if ($tareas_estudiante->estado == 0)
                        <button class="btn btn-success" wire:click="entregarTarea({{$tareas_estudiante->id}})">
                            ENTREGAR
                        </button>
                        @endif
                        @if ($tareas_estudiante->estado == 1)
                        <p>entregado</p>
                        @endif
                    </td>
                </tr>
                @endforeach
              </table>
        </div>
    @endcan
</div>