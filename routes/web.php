<?php

use App\Http\Controllers\AlmaController;
use App\Http\Controllers\FichasgenericasController;
use App\Http\Controllers\FichasshinigamiController;
use App\Http\Controllers\FichasyokaisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('/');

Route::get('/usuario/entrar', [UserController::class, 'showLoginForm'])->name('user.login');
Route::get('/usuario/sair', [UserController::class, 'logout'])->name('user.logout');
Route::post('/usuario/entrar/validacao', [UserController::class, 'login'])->name('user.login.do');
Route::resource('/usuario', UserController::class)
    ->names('user')
    ->parameters(['usuario' => 'user']);

// FICHA SHINIGAMI
Route::put('/shinigami/caminho/{fichasshinigami}', [FichasshinigamiController::class, 'caminho'])->name('shinigami.caminho');
Route::put('/shinigami/classe/{fichasshinigami}', [FichasshinigamiController::class, 'classe'])->name('shinigami.classe');
Route::put('/shinigami/heranca/{fichasshinigami}', [FichasshinigamiController::class, 'heranca'])->name('shinigami.heranca');
Route::put('/shinigami/vida/{fichasshinigami}', [FichasshinigamiController::class, 'updatelife'])->name('shinigami.updatelife');
Route::put('/shinigami/despertado/{fichasshinigami}', [FichasshinigamiController::class, 'updateawaken'])->name('shinigami.updateawaken');
Route::put('/shinigami/imagem/character/{fichasshinigami}', [FichasshinigamiController::class, 'updateImageCharacter'])->name('shinigami.updateimagecharacter');
Route::put('/shinigami/imagem/dragon/{fichasshinigami}', [FichasshinigamiController::class, 'updateImageDragon'])->name('shinigami.updateimagedragon');
Route::put('/shinigami/dragao/{fichasshinigami}', [FichasshinigamiController::class, 'updatedragon'])->name('shinigami.updatedragon');
Route::put('/shinigami/arma/{fichasshinigami}', [FichasshinigamiController::class, 'updatearma'])->name('shinigami.updatearma');
Route::put('/shinigami/descricao/{fichasshinigami}', [FichasshinigamiController::class, 'updateDescription'])->name('shinigami.updatedescription');
Route::resource('/shinigami', FichasshinigamiController::class)
    ->names('shinigami')
    ->parameters(['shinigami' => 'fichasshinigami']);

Route::post('/shinigami/alma', [AlmaController::class, 'store'])->name('shinigami.soul.store');
Route::put('/shinigami/alma/atualizar', [AlmaController::class, 'update'])->name('shinigami.soul.update');
Route::delete('/shinigami/alma/deletar', [AlmaController::class, 'destroy'])->name('shinigami.soul.delete');

// FICHA GENERICA
Route::put('/generica/vida/{fichasgenerica}', [FichasgenericasController::class, 'updateLife'])->name('generica.updatelife');
Route::put('/generica/imagem/{fichasgenerica}', [FichasgenericasController::class, 'updateImage'])->name('generica.updateimage');
Route::put('/generica/descricao/{fichasgenerica}', [FichasgenericasController::class, 'updateDescription'])->name('generica.updatedescription');
Route::resource('/generica', FichasgenericasController::class)
    ->names('generica')
    ->parameters(['generica' => 'fichasgenerica']);

// FICHA YOKAI
Route::put('/yokai/vida/{fichasyokai}', [FichasyokaisController::class, 'updateLife'])->name('yokai.updatelife');
Route::put('/yokai/imagem/{fichasyokai}', [FichasyokaisController::class, 'updateImage'])->name('yokai.updateimage');
Route::put('/yokai/descricao/{fichasyokai}', [FichasyokaisController::class, 'updateDescription'])->name('yokai.updatedescription');
Route::resource('/yokai', FichasyokaisController::class)
    ->names('yokai')
    ->parameters(['yokai' => 'fichasyokai']);
