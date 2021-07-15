<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
        // return redirect()->route('showProject');
        return redirect('/login'); 
});
    


Auth::routes();

Route::get('/home', 'ProjectController@showProject')->name('home');

Route::get('/project', 'ProjectController@showProject')->name('showProject');

Route::post('/project', 'ProjectController@store')->name('projectstore');

Route::match(['get','post'], '/card/{id}', 'CardController@store')->name('cardstore')->middleware('auth');;

Route::get('/card/{id}', 'CardController@showCard')->name('showcard');

Route::match(['get','post'], '/task/{id}', 'TaskController@store')->name('taskstore')->middleware('auth');;

Route::get('/task/{id}', 'TaskController@showTask')->name('showtask');

Route::post('/card/status/{id}', 'CardController@cardStatus')->name('cardstatus');

Route::post('/task/status/{id}', 'TaskController@taskStatus')->name('taskstatus');

Route::post('/task/status2/{id}', 'TaskController@taskStatus2')->name('taskstatus2');

Route::post('/project/status/{id}', 'ProjectController@projectStatus')->name('projectstatus');



// ドラッグアンドドロップでステータス変更する場合のルート
Route::get('/project/statuschange1/{id}', 'ProjectController@projectDragStatus1');
Route::get('/project/statuschange2/{id}', 'ProjectController@projectDragStatus2');
Route::get('/project/statuschange3/{id}', 'ProjectController@projectDragStatus3');

Route::get('/card/statuschange1/{id}', 'CardController@cardDragStatus1');
Route::get('/card/statuschange2/{id}', 'CardController@cardDragStatus2');
Route::get('/card/statuschange3/{id}', 'CardController@cardDragStatus3');

Route::get('/task/statuschange1/{id}', 'TaskController@taskDragStatus1');
Route::get('/task/statuschange2/{id}', 'TaskController@taskDragStatus2');
Route::get('/task/statuschange3/{id}', 'TaskController@taskDragStatus3');


// カードを削除する場合のルート
Route::get('/project/delete/{id}', 'ProjectController@delete');
Route::get('/card/delete/{id}', 'CardController@delete');
Route::get('/task/delete/{id}', 'TaskController@delete');


