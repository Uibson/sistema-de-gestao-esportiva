<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\GestorController; // Importação do GestorController
use App\Http\Controllers\InstitutionController; // Importação do InstitutionController
use App\Http\Controllers\ModalityController; // Importação do ModalityController
use App\Http\Controllers\EventController; // Importação do EventController
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
#rotas administrador
Route::middleware(['auth', 'role:Admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Instituições
    Route::resource('institutions', InstitutionController::class);

    // Modalidades
    Route::resource('modalities', ModalityController::class);

    // Alunos
    Route::resource('students', StudentController::class);

    // Professores/Técnicos
    Route::resource('teachers', TeacherController::class);

    // Eventos
    Route::resource('events', EventController::class);

    // Inscrições
    Route::resource('registrations', RegistrationController::class);

    // Relatórios
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    

});


#ROTAS NIVEL GESTOR
Route::middleware(['auth', 'role:Gestor'])->group(function () {
    // Dashboard do Gestor
    Route::get('/gestor', [GestorController::class, 'index'])->name('gestor.dashboard');

    // Rotas para Instituições
    Route::get('/gestor/institutions', [GestorController::class, 'institutions'])->name('gestor.institutions');
    Route::get('/gestor/institutions/create', [GestorController::class, 'createInstitution'])->name('gestor.institutions.create');
    Route::post('/gestor/institutions', [GestorController::class, 'storeInstitution'])->name('gestor.institutions.store');
    Route::get('/gestor/institutions/{institution}/edit', [GestorController::class, 'editInstitution'])->name('gestor.institutions.edit');
    Route::put('/gestor/institutions/{institution}', [GestorController::class, 'updateInstitution'])->name('gestor.institutions.update');
    Route::delete('/gestor/institutions/{institution}', [GestorController::class, 'destroyInstitution'])->name('gestor.institutions.destroy');

    // Rotas para Modalidades
    Route::get('/gestor/modalities', [GestorController::class, 'modalities'])->name('gestor.modalities');
    Route::get('/gestor/modalities/create', [GestorController::class, 'createModality'])->name('gestor.modalities.create');
    Route::post('/gestor/modalities', [GestorController::class, 'storeModality'])->name('gestor.modalities.store');
    Route::get('/gestor/modalities/{modality}/edit', [GestorController::class, 'editModality'])->name('gestor.modalities.edit');
    Route::put('/gestor/modalities/{modality}', [GestorController::class, 'updateModality'])->name('gestor.modalities.update');
    Route::delete('/gestor/modalities/{modality}', [GestorController::class, 'destroyModality'])->name('gestor.modalities.destroy');

    // Rotas para Eventos
    Route::get('/gestor/events', [GestorController::class, 'events'])->name('gestor.events');
    Route::get('/gestor/events/create', [GestorController::class, 'createEvent'])->name('gestor.events.create');
    Route::post('/gestor/events', [GestorController::class, 'storeEvent'])->name('gestor.events.store');
});


#ROTAS NIVEL COORDENADOR
Route::middleware(['auth', 'role:Coordenador'])->group(function () {
    // Modalidades
    Route::resource('modalities', ModalityController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update']);

    // Eventos
    Route::resource('events', EventController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update']);

    // Inscrições
    Route::resource('registrations', RegistrationController::class)->only(['index', 'show', 'create', 'store']);
});

#ROTAS PRO OPERADOR

Route::middleware(['auth', 'role:Operador'])->group(function () {
    // Alunos
    Route::resource('students', StudentController::class)->only(['index', 'show', 'create', 'store']);

    // Professores/Técnicos
    Route::resource('teachers', TeacherController::class)->only(['index', 'show', 'create', 'store']);

    // Inscrições
    Route::resource('registrations', RegistrationController::class)->only(['index', 'show', 'create', 'store']);
});
