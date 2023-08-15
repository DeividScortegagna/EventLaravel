<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show']);
// Route::get('/events/event', [EventController::class, 'create']); //mudar
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}',[EventController::class, 'update'])->middleware('auth');
Route::post('/events/join/{id}',[EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');

Route::get('/welcome', function () {
    return view('/welcome');
});

Route::get('/produtos', function () {
        $busca = request('search');
        return view ('products', ['busca' => $busca]);
});

Route::get('/produtos_teste/{id}', function ($id = null) {

    if (!is_numeric($id) || is_null($id) || $id === "") {
        return "Use um ID valido, ou contate o administrador!";
    }
    return view ('product', ['id' => $id]);
});

Route::get('/contact', function () {
    return view ('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::fallback(function () {
    return view('/errors/404');
});

Route::get('/produtos_teste/', function () {
    return "Você não passou nenhum id";
    // OU
    // return redirect('/');  para voltar para tela inicial
});

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */ //JETSTREAM pasta padrão
