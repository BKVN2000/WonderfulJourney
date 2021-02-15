<?php

use App\Category;
use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'HomePage')->name('HomePage');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admins', 'AdminController@index')->name('ViewAdminUsers');
    Route::get('/members', 'UserController@index')->name('ViewMemberUsers');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@edit')->name('ShowUpdateUserForm');
    Route::post('/{user}', 'UserController@update')->name('SubmitUpdateUser');
    Route::delete('/{user}', 'UserController@destroy')->name('DeleteUser');
    Route::get('/{user}/articles', 'UserController@getArticles')->name('ShowMemberArticles');

});

Route::group(['prefix' => 'article'], function () {
    Route::delete('{article}', 'ArticleController@index')->name('DeleteArticle');
    Route::post('/{article}', 'ArticleController@store')->name('SubmitPostArticle');
    Route::get('/article/form', 'ArticleController@create')->name('ShowPostArticleForm');
    Route::get('/{id}/detail', 'ArticleController@show')->name('ShowArticleDetail');
});

Route::get('/category/{id}/articles', function ($id) {
    $category = Category::find($id)->get();
    return view('viewArticlesByCategory',compact('category'));
})->name('ShowArticleByCategory');




