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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{provider}/auth',['uses'=>'SocialsController@auth','as'=>'social.auth']);

Route::get('{provider}/redirect',['uses'=>'SocialsController@auth_callback','as'=>'social.callback']);

Route::group(['middleware'=>'auth'],function(){
Route::resource('/channels','ChannelsController');
});

Route::get('/discussion/my-discussions',['uses'=>'DiscussionsController@mine','as'=>'discussion.mine']);

Route::resource('/forum','ForumsController');

Route::group(['middleware'=>'auth'],function(){
  Route::resource('/discussion','DiscussionsController');

});

Route::group(['middleware'=>'auth'],function(){
  Route::resource('/discussion/replies','RepliesController');
  Route::get('/discussion/watch/{id}',['uses'=>'WatchersController@watch','as'=>'discussion.watch']);
  Route::get('/discussion/unwatch/{id}',['uses'=>'WatchersController@unwatch','as'=>'discussion.unwatch']);
});

Route::get('discussion/{slug}',['uses'=>'DiscussionsController@show','as'=>'discussionSlug']);

Route::get('reply/like/{id}',['uses'=>'RepliesController@like','as'=>'reply.like']);
Route::get('reply/unlike/{id}',['uses'=>'RepliesController@unlike','as'=>'reply.unlike']);
