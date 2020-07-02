<?php

use App\Http\Controllers\CommentRepliesController;
use App\Role;
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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');




Route::get('/post/{id}',['as'=>'home.post','uses'=> 'HomeController@post']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','AdminController@index'); 
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/medias','AdminMediasController');
    Route::resource('admin/comments' , 'PostCommentsController');
    Route::resource('admin/comments/replies' , 'CommentRepliesController');
    Route::delete('/delete/media',['as'=>'delete.media','uses'=>'AdminMediasController@deleteMedia']);

});


Route::group(['middleware'=>'auth'],function(){

    Route::post('comment/reply','CommentRepliesController@createReply');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});