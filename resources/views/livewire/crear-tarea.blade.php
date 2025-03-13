<div>
    <div style="text-align: center">
        <p>CREAR TAREA</p>
    </div>
    <div style="text-align: center">
        <form wire:submit="save">
            <div class="mb-3">
                <label class="form-label">TITULO</label>
                <input type="text" class="form-control" wire:model="titulo">
                @error('titulo')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">DESCRIPCION</label>
                <input type="text" class="form-control" wire:model="descripcion">
                @error('descripcion')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">ESTUDIANTES</label>
                <input type="text" class="form-control" wire:model="estudiantes">
                @error('estudiantes')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">FECHA DE ENTREGA</label>
                <input type="date" class="form-control" wire:model="fecha_entrega">
                @error('fecha_entrega')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div style="text-align: center; margin-top: 1%;">
                <button type="submit" class="btn btn-success">CREAR</button>
            </div>
        </form>

    </div>
</div>