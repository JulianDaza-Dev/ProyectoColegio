<?php

use App\Livewire\CrearTarea;
use App\Livewire\CrearUsuario;
use App\Livewire\CrearUsuarioProfe;
use App\Livewire\Inicio;
use Illuminate\Support\Facades\Route;
use Pest\Plugins\Init;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('inicio', Inicio::class)
    ->middleware(['auth'])
    ->name('inicio');

Route::get('crear-usuario', CrearUsuario::class)
    ->middleware(['auth'])
    ->name('crear-usuario');

Route::get('crear-usuario-profe', CrearUsuarioProfe::class)
    ->middleware(['auth'])
    ->name('crear-usuario-profe');

    Route::get('crear-tarea', CrearTarea::class)
    ->middleware(['auth'])
    ->name('crear-tarea');
    
require __DIR__ . '/auth.php';
