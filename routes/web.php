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
Route::post('/searchByAddress', 'ListController@searchByAddress')->name('searchByAddress'); //チーム所在地で検索
Route::post('/searchByDate', 'ListController@searchByDate')->name('searchByDate'); //日付で検索
Route::post('/searchByAddressDate', 'ListController@searchByAddressDate')->name('searchByAddressDate'); //日付と所在地で検索

// マイページを表示
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit', 'BBmatchController@showEdit')->name('edit'); // チーム詳細編集画面を表示
Route::post('/home/update', 'BBmatchController@exeUpdate')->name('update'); // チーム詳細編集内容を登録

// 他のユーザー画面を表示
Route::get('/user/{id}/{user_id}', 'BBmatchController@showUser')->name('user');

// 募集要項を登録
Route::post('/home/recruit', 'RecruitController@exeRecruit')->name('recruit');



// ______________________________________________________________ reactのテスト
// Route::get('/{any}', function () {
//     return view('react_test');
// })->where('any','.*');