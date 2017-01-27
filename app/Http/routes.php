<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
 * web
 * */
//Route::get('index','IndexController@index')->name('index');
Route::group(['namespace'=>'Web'],function (){
    Route::get('/','IndexController@index')->name('index');
    Route::get('cate/{id}','IndexController@category')->name('cate');
    Route::get('art/{id}','IndexController@article')->name('article');
});



/*
 * admin
 * */
Route::any('/admin/login','Admin\LoginController@login')->name('admin_login');
Route::get('admin/code','Admin\LoginController@code')->name('admin_code');

Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('/','IndexController@index')->name('admin_index');
    Route::get('info','IndexController@info')->name('admin_info');
    Route::any('change_password','IndexController@change_password')->name('admin_change_password');
    Route::get('logout','IndexController@logout')->name('admin_logout');
//
    Route::post('change_order','CategoryController@change_order')->name('cate_change_order');
    Route::resource('category','CategoryController');

    Route::resource('article','ArticleController');

    Route::resource('banner','BannerController');
    Route::post('change_banner_order','BannerController@change_banner_order')->name('change_banner_order');

    Route::any('upload_image','CommonController@upload_image')->name('upload_image');
    //banner
//    Route::any('upload_image','BannerController@upload_image')->name('upload_image');

});


Route::any('admin/crypt','Admin\LoginController@crypt');
Route::get('admin/getcode','Admin\LoginController@getcode');




//Test
//Route::any('index','TestController@index')->name('index');
Route::any('password_validate','TestController@password_validate')->name('password_validate');

Route::any('img','TestController@img')->name('img');
Route::any('uploads','TestController@uploads')->name('uploads');
Route::any('re','TestController@relations')->name('re');
Route::any('relation',function (){
    $article= new \App\Http\Model\Article();
    $article->relations();

});
