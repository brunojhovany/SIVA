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
        Route::get('/capturarpuntos/masdeunavez','puntosfijos@MoreThanOnce');
        Route::get('/capturarpuntos/api/municipio','puntosfijos@Municipios');
        Route::post('/capturarpuntos/api/localidad','puntosfijos@Localidades');
        Route::post('/capturarpuntos/api/direccion','puntosfijos@Direccion');
        Route::post('/capturarpuntos/api/unavez','puntosfijos@SaveSolounavez');
        Route::post('/capturarpuntos/api/admon-notifications','adminController@store_notifications');
        Route::get('configuracion/lista-manuales', 'adminController@ListFiles');
        Route::get('/ver/historial', 'HistoricController@HistoricView');
        Route::post('/consulta/historial', 'HistoricController@HistoricQuery');
        Route::get('/ver/lista-historial', 'HistoricController@HistoricQuery');


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
        Route::get('/admin/configuracion/admonguides/upfile','adminController@Upfiles');
        Route::post('/admin/configuracion/api/files-admon','adminController@store_files');
        Route::post('/admin/configuracion/api/admonregistersave','adminController@AdmonRegisterSave');
        Route::get('guides/download/{filename}','adminController@DownloadGuide');
        Route::delete('guides/delete/{idfile}/{filename}','adminController@DeleteGuide');
        Route::post('/capturarpuntos/masdeunavez/save','puntosfijos@SaveMoreThanOnce');

        Route::get('/monitoreo/modificar/{semana}','monitoreo@GetSemana');
        Route::post('/monitoreo/modificar/admin/habilitarreg','monitoreo@habilitarreg');
        Route::get('/monitoreo/eliminar/{semana}','monitoreo@Eliminar');
        Route::delete('/admin/monitoreo/eliminar/{idregistro}','monitoreo@EliminarRegistro');
        Route::get('monitoreo/resultadosbacteriologicos/{mes}','monitoreo@ResultadosBacteriologicos');
        Route::get('/reporte/reporte_mensual_de_municipio','Reportes@reporte_mensual');
        Route::get('/reporte/reporte_por_localidad','Reportes@reporte_localidad');
        
    });
    