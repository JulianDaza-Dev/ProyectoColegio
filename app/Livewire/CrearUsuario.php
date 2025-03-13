<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CrearUsuario extends Component
{
    public  $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public function save()
    {
        $this->password_confirmation= $this->password;
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user = User::create($validated);
        $user->assignRole('estudiante');

        return to_route('inicio');

    }
    public function render()
    {
        return view('livewire.crear-usuario');
    }
}
