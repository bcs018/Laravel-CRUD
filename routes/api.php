<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'LivrosController@showLivros')->name('livros.list');
Route::post('visualizar', 'LivrosController@showLivro')->name('livros.show');
Route::post('visualizar-texto', 'LivrosController@showLivroTxt')->name('livros.search');
Route::get('livro{id}', 'LivrosController@getLivro')->name('livros.get');
Route::get('salvar', 'LivrosController@saveLivro')->name('livros.save');
Route::post('store', 'LivrosController@storeLivro')->name('livros.add');
Route::get('editar/{id}', 'LivrosController@editLivro')->name('livros.edit');
Route::post('atualizar', 'LivrosController@updateLivro')->name('livros.update');
Route::get('deletar/{id}', 'LivrosController@deleteLivro')->name('livros.delete');
