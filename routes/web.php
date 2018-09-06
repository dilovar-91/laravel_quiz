<?php

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
    return view('home');
});

/
Route::resource('/task', 'TaskController');
Route::resource('/savol', 'SavolController');



Auth::routes();		

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/natija', 'NatijaController@index')->name('natija');
Route::get('/klaster/', 'KlasterController@index')->name('klaster');
Route::get('/klaster/{id_klaster}', 'KlasterController@index')->name('klaster');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/sanjish', 'QuestionController@sanjish')->name('sanjish');
Route::get('/sanjish/{id_fan}/{kat}', 'QuestionController@sanjish')->name('sanjish');

Route::post('/save_result', 'QuestionController@save_result')->name('save_result');
Route::get('/savolho', 'SavolhoController@index')->name('savolho');


//Route::resource('/savolho/edit', 'TaskController@edit');


Route::get('current_quests', 'QuestController@index');
Route::get('archived_quests', 'QuestController@archived');
Route::post('create_quest', 'QuestController@store');
Route::post('delete_quest/{id}', 'QuestController@destroy');
Route::post('archive_quest/{id}', 'QuestController@archive');
Route::post('edit_quest', 'QuestController@edit');
