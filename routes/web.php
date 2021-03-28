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


Route::get('/', function(){
    return view('top');
})->name('showTop');

// チーム一覧画面を表示
Route::get('/showSearchRecruit', 'ListController@showList')->name('showSearchRecruit');
Route::post('/searchByAddressDate', 'ListController@searchByAddressDate')->name('searchByAddressDate'); //日付と所在地で検索

// マイページを表示
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/chat/{recruit_id}', 'HomeController@chat')->name('chat');
Route::get('/home/chat/{recruit_id}/{message_user_id}', 'HomeController@message')->name('message');
Route::get('/home/edit', 'HomeController@showEdit')->name('edit'); // チーム詳細編集画面を表示
Route::post('/home/update', 'HomeController@exeUpdate')->name('update'); // チーム詳細編集内容を登録

// 募集要項を登録
Route::get('/user/{recruit_id}/{user_id}', 'RecruitController@showRecruit')->name('show_recruit');
Route::post('/home/recruit_store', 'RecruitController@storeRecruit')->name('store_recruit');
Route::post('/home/recruit_delete', 'RecruitController@delete_recruit')->name('delete_recruit');

// メッセージ機能
Route::post('/home/reply', 'MessageController@replyMessage')->name('reply_msg');


// ゲストユーザーログイン
Route::get('guest01', 'Auth\LoginController@guestLogin_01')->name('login_guest_01');
Route::get('guest02', 'Auth\LoginController@guestLogin_02')->name('login_guest_02');

// 新規投稿フォームを表示
Route::get('/home/post_form', 'RecruitController@postRecruit')->name('post_recruit');