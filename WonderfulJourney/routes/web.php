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

Route::view('/', 'HomePage')->name('home');
Route::get('/category/{id}/articles', function ($id) {
    $category = Category::find($id);
    return view('viewArticlesByCategory',compact('category'));
})->name('ShowArticleByCategory');

Auth::routes();

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admins', 'UserController@showAdminUsers')->name('ViewAdminUsers');
    Route::get('/members', 'UserController@showAdminMembers')->name('ViewMemberUsers');
});

Route::group(['prefix' => 'user','middleware' => ['auth','member']], function () {
    Route::get('/edit/{user}', 'UserController@edit')->name('ShowUpdateUserForm');
    Route::put('/edit/submit/{user}', 'UserController@update')->name('SubmitUpdateUser');
    Route::delete('/{user}', 'UserController@destroy')->name('DeleteUser')->withoutMiddleware('member')->middleware('admin');
    Route::get('/articles/{user}', 'UserController@getArticles')->name('ShowMemberArticles');

});

Route::group(['prefix' => 'article','middleware' => ['auth','member']], function () {
    Route::delete('{article}', 'ArticleController@destroy')->name('DeleteArticle')->withoutMiddleware('member')->middleware('admin');
    Route::post('/u/submit', 'ArticleController@store')->name('SubmitPostArticle');
    Route::get('/article/form', 'ArticleController@create')->name('ShowPostArticleForm');
    Route::get('/{article}/detail', 'ArticleController@show')->name('ShowArticleDetail')->withoutMiddleware(['auth','member']);
});





