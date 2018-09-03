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
    Route::group(['middleware'=>'auth'],function(){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/capturarpuntos/unavez','puntosfijos@solounaves');
        Route::get('/capturarpuntos/masdeunavez','puntosfijos@morethanonce');
        Route::get('/capturarpuntos/api/municipio','puntosfijos@Municipios');
        Route::post('/capturarpuntos/api/localidad','puntosfijos@Localidades');
        Route::post('/capturarpuntos/api/direccion','puntosfijos@Direccion');
        Route::post('/capturarpuntos/api/unavez','puntosfijos@SaveSolounavez');
        Route::post('/capturarpuntos/api/admon-notifications','adminController@store_notifications');

        Route::get('/admin/configuracion', 'adminController@Index');
        Route::get('/admin/configuracion/admonusers', 'adminController@AdmonUsers');
        Route::get('/admin/configuracion/admonnotifictions', 'adminController@AdmonNotifictions');
        Route::get('/admin/configuracion/admonguides', 'adminController@AdmonGuides');
        Route::get('/admin/configuracion/admonregister', 'adminController@AdmonRegister');
        Route::get('/admin/configuracion/api/alerts', 'adminController@Notifications');
        Route::post('/admin/configuracion/api/admonregistersave', 'adminController@AdmonRegisterSave');
        Route::post('/admin/configuracion/api/admonusers/getusertoedit', 'adminController@EditUserForm');
        Route::post('/admin/configuracion/api/admonusers/updateusers', 'adminController@UpdateUsers');
        Route::post('/admin/configuracion/api/admonusers/deleteuser', 'adminController@DeleteUsers');
        Route::get('/admin/configuracion/admonusers/getformtonewusr', 'adminController@NewUserForm');
        Route::post('/admin/configuracion/api/admonusers/newuser', 'adminController@NewUser');
    });
