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
    Route::post('ajax-sesion' ,'AjaxController@setSession')->name('ajax')->middleware('auth');
    Route::group(['prefix'=>'admin','namespace' => 'admin', 'middleware' =>['auth','superadmin']], function(){
    Route::get('', 'AdminController@index');
            /*RUTAS PERMISOS */
    Route::get('permiso','PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear.permiso');
    Route::post('permiso', 'PermisoController@guardar')->name('guardar.permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar.permiso');
    Route::put('permiso/{id}','PermisoController@actualizar')->name('actualizar.permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar.permiso');
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
    Route::get('rol/crear', 'RolController@crear')->name('crear.rol');
    Route::post('rol', 'RolController@guardar')->name('rol.guardar');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar.rol');
    Route::put('rol/{id}', 'RolController@actualizar')->name('rol.actualizar');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar.rol');

            /*RUTAS ROL MENU */
    Route::get('menu-rol', 'MenuRolController@index')->name('rol.menu');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('rol.menu.guardar');

            /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso.rol');
    Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar.permiso.rol');

            /* RUTAS USUARIOS */
    Route::get('usuario','UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear.usuario');
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar.usuario');
    Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar.usuario');
    Route::put('usuario/{id}','UsuarioController@actualizar')->name('actualizar.usuario');
    Route::delete('usuario/{id}', 'UsuarioController@eliminar')->name('eliminar.usuario');
});
    Route::get('libro', 'LibroController@index')->name('libro');
    Route::get('libro/crear', 'LibroController@crear')->name('crear.libro');
    Route::post('libro', 'LibroController@guardar')->name('guardar.libro');
    Route::get('libro/{id}/editar', 'LibroController@editar')->name('editar.libro');
    Route::put('libro/{id}', 'LibroController@actualizar')->name('actualizar.libro');
    Route::delete('libro/{id}', 'LibroController@eliminar')->name('eliminar.libro');
