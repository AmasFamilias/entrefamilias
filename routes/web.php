<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalentoController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PrincipioController;
use App\Http\Controllers\ConversacionController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\OrganizacionController;
use App\Http\Controllers\MensajeNotificacionController;
use App\Http\Controllers\LegalController;

Route::get('/', HomeController::class)->name('home');
Route::get('/funcionamiento', [HomeController::class, 'funcionamiento'])->name('funcionamiento');
Route::get('/cambiarlascosas', [HomeController::class, 'cambiarlascosas'])->name('cambiarlascosas');
Route::get('/amasfamilias', [HomeController::class, 'amasfamilias'])->name('amasfamilias');
Route::get('/personas', [HomeController::class, 'personas'])->name('seccionpersonas');
Route::get('/terminos-condiciones', [LegalController::class, 'terminosCondiciones'])->name('terminos-condiciones');
Route::get('/politica-privacidad', [LegalController::class, 'politicaPrivacidad'])->name('politica-privacidad');
Route::view('/aviso-legal', 'legal.aviso-legal')->name('aviso-legal');
Route::get('/proteccion-datos', [LegalController::class, 'proteccionDatos'])->name('proteccion-datos');

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified'])->name('vacantes.index');
Route::get('/anuncio/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/anuncio/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/anuncio/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/anuncio/categoria/{categoria}', [CategoriaController::class, 'show'])->name('vacantes.categoria');
Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/habilidades', [HabilidadController::class, 'index'])->name('habilidades.index');
    Route::get('/talentos', [TalentoController::class, 'index'])->name('talentos.index');
    Route::get('/principios', [PrincipioController::class, 'index'])->name('principios.index');
    Route::post('/profile/update-image', [ProfileController::class, 'updateProfileImage'])->name('profile.updateImage');
    Route::delete('/profile/delete-image', [ProfileController::class, 'deleteImage'])->name('profile.deleteImage');
    Route::get('/organizaciones', [OrganizacionController::class, 'index'])->name('organizaciones.index');
});

//Mensajes
Route::middleware(['auth'])->group(function () {
    Route::get('/mensajes/{vacante}/{user_id}', [MessengerController::class, 'index'])->name('mensajes.index');
    Route::get('/notificaciones-mensajes', MensajeNotificacionController::class)->name('notificaciones.mensajes');
    Route::get('/mensaje/{mensaje_id}', [MessengerController::class, 'show'])->name('mensajes.show');
    Route::get('/conversaciones', [ConversacionController::class, 'index'])->name('conversaciones.index');
});

//Notificaciones
Route::get('/notificaciones', [NotificacionController::class, '__invoke'])->middleware(['auth', 'verified'])->name('notificaciones.index');
Route::post('/notificaciones/{id}/leer', [NotificacionController::class, 'marcarComoLeida'])->middleware(['auth', 'verified'])->name('notificaciones.leer');
Route::get('/notificaciones/marcar-leida/{notification}', [MensajeNotificacionController::class, 'marcarComoLeida'])->middleware(['auth', 'verified'])->name('notificaciones.leer-mensaje');

require __DIR__.'/auth.php';