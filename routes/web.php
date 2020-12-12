<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/books', 'HomeController@books');
Route::get('/readers', 'HomeController@readers');
Route::get('/authors', 'HomeController@authors');
Route::get('/publishers', 'HomeController@publishers');
Route::get('/typeOfBooks', 'HomeController@typeOfBooks');
Route::get('/users', 'HomeController@users');
Route::get('/createUser', 'HomeController@createUser');
Route::get('/createAuthor', 'HomeController@createAuthor');
Route::get('/createBook', 'HomeController@createBook');
Route::get('/createLend', 'HomeController@createLend');
Route::get('/createPublisher', 'HomeController@createPublisher');
Route::get('/createReader', 'HomeController@createReader');
Route::get('/createTypeOfBook.blade.php', 'HomeController@createTypeOfBook');
Route::post('/admin/books/save','HomeController@storeBook');
Route::post('/admin/reader/save','HomeController@storeReader');
Route::post('/admin/authors/save','HomeController@storeAuthor');
Route::post('/admin/publisher/save','HomeController@storePublisher');
Route::post('/admin/type/save','HomeController@storeType');
Route::post('/admin/users/save','HomeController@storeUser');
Route::post('/admin/lend/save','HomeController@storeLend');
Route::get('/deleteLend/{id}','HomeController@deleteLend');
Route::get('/deleteAuthor/{id}','HomeController@deleteAuthor');
Route::get('/deleteBook/{id}','HomeController@deleteBook');
Route::get('/deletePublisher/{id}','HomeController@deletePublisher');
Route::get('/deleteReader/{id}','HomeController@deleteReader');
Route::get('/deleteTypeOfBook/{id}','HomeController@deleteTypeOfBook');
Route::get('/deleteUser/{id}','HomeController@deleteUser');
