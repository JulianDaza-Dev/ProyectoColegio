<div>
    <div style="text-align: center">
        <p>CREAR ESTUDIANTE</p>
    </div>
    <div style="text-align: center">
        <form wire:submit="save">
            <div class="mb-3">
                <label class="form-label">NOMBRE</label>
                <input type="text" class="form-control" wire:model="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label class="form-label">EMAIL</label>
                <input type="text" class="form-control" wire:model="email">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <div class="mb-3">
                <label  class="form-label">CONTRASEÑA</label>
                <input type="text" class="form-control" wire:model="password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <div style="text-align: center; margin-top: 1%;">
                  <button type="submit" class="btn btn-success">CREAR</button>
            </div>
        </form>

    </div>
</div>