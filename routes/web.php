<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return view('welcome');
});

Route::get('users', 'UsuarioController@getUsers'); //JSON de Usuarios index en CRUD

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
	Route::resource('roles', 'RoleController');
	Route::resource('privilegios', 'PermissionController');
	//Usuario
	Route::get('usuario', 'UsuarioController@index')->name('usuario.index')
				 ->middleware('permission:usuario.index');

	Route::get('usuario/{user}/edit', 'UsuarioController@edit')->name('usuario.edit')
				 ->middleware('permission:usuario.edit');	
	Route::put('usuario/{user}', 'UsuarioController@update')->name('usuario.update')
				 ->middleware('permission:usuario.edit');

	Route::get('privilegios/{privilegio}/edit', 'PermissionController@edit')->name('privilegios.edit')
				 ->middleware('permission:privilegios.edit');	
	Route::put('privilegios/{privilegio}', 'PermissionController@update')->name('privilegios.update')
				 ->middleware('permission:privilegios.edit');

	Route::get('usuario/{user}', 'UsuarioController@show')->name('usuario.show')
				 ->middleware('permission:usuario.show');

	Route::delete('usuario/{user}', 'UsuarioController@destroy')->name('usuario.destroy')
				 ->middleware('permission:usuario.destroy');


	Route::get('privilegios/create', 'PermissionController@create')->name('privilegios.create')
				 ->middleware('permission:privilegios.create');	
	Route::post('privilegios/store', 'PermissionController@store')->name('privilegios.store')
				 ->middleware('permission:privilegios.create');
	
});