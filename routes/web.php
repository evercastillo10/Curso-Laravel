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

use App\Http\Controllers\Admin\RolController;

Route::get('/','InicioController@index')->name('inicio');
Route::get('login', 'Seguridad\LoginController@index')->name('login');
Route::post('login', 'Seguridad\LoginController@login')->name('login.post');
Route::get('logout', 'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix'=>'admin','namespace' => 'admin', 'middleware' =>['auth','superadmin']], function(){
    Route::get('', 'AdminController@index');
    Route::get('permiso','PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear.permiso');

            /*RUTAS DEL MENU*/
    Route::get('menu','MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear.menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar.menu');
    Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar.menu');
    Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar.menu');
    Route::post('menu/guardar-orden','MenuController@guardarOrden')->name('guardar.orden');
    Route::get('menu/{id}','MenuController@eliminar')->name('eliminar.menu');

            /*RUTAS ROL*/
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('rol.crear');
    Route::post('rol', 'RolController@guardar')->name('rol.guardar');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('rol.editar');
    Route::put('rol/{id}', 'RolController@actualizar')->name('rol.actualizar');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('rol.eliminar');

            /*RUTAS ROL MENU */
    Route::get('menu-rol', 'MenuRolController@index')->name('rol.menu');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('rol.menu.guardar');
});
