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


// チーム一覧画面を表示
Route::get('/', 'ListController@showList')->name('show');
Route::post('/member', 'ListController@showMember')->name('member');
Route::post('/date', 'ListController@showDate')->name('date');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{id}/{date}', 'BBmatchController@showUser')->name('user');

// チーム詳細編集画面を表示
Route::get('/home/edit', 'BBmatchController@showEdit')->name('edit');
// チーム詳細編集内容を登録
Route::post('/home/update', 'BBmatchController@exeUpdate')->name('update');
// マイページの作成
Route::post('/home/store', 'BBmatchController@exeStore')->name('store');
// スケジュールの登録
Route::get('/home/schedule', 'BBmatchController@editSchedule')->name('editSchedule');
// スケジュールの作成
Route::post('/home/schedule', 'BBmatchController@exeSchedule')->name('schedule');
// スケジュールの作成
Route::post('/search/user', 'BBmatchController@exeSearchSchedule')->name('SearchSchedule');

// 画像アップロード機能
Route::get('/form', 'UploadImageController@show')->name('upload_form');
Route::post('/upload', 'UploadImageController@upload')->name('upload_image');