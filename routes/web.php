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

Route::get('app/users', 'UsersController@list');
Route::get('app/users/create', 'UsersController@create');
Route::post('app/users/create', 'UsersController@store');

Route::get('app/users/show/{id}', 'UsersController@show');
Route::get('app/users/PDF/{id}', 'UsersController@PDF');
Route::get('app/users/alergias/{id}', 'UsersController@allergies');
Route::get('app/users/edit/usuario/{id}', 'UsersController@editUsuario');
Route::post('app/users/edit/usuario/{id}', 'UsersController@updateUsuario');

Route::get('app/users/edit/direccion/{id}', 'UsersController@editDireccion');
Route::post('app/users/edit/direccion/{id}', 'UsersController@updateDireccion');

Route::get('app/users/edit/personal/{id}', 'UsersController@editPersonal');
Route::post('app/users/edit/personal/{id}', 'UsersController@updatePersonal');

Route::get('app/users/edit/expediente/{id}', 'UsersController@editExpediente');
Route::post('app/users/edit/expediente/{id}', 'UsersController@updateExpediente');

Route::get('app/users/edit/nacimiento/{id}', 'UsersController@editNacimiento');
Route::post('app/users/edit/nacimiento/{id}', 'UsersController@updateNacimiento');

Route::get('app/users/alergias/{id}/get', 'UsersController@getAllergies');
Route::post('app/users/createAllergy', 'UsersController@storeAllergy');
Route::post('app/users/deleteAllergy', 'UsersController@deleteAllergy');

Route::get('app/citas', 'DatesController@list');
Route::get('app/citas/create', 'DatesController@create');
Route::post('app/citas/create', 'DatesController@store');
Route::post('app/citas/create/getSugest', 'DatesController@sugest');
Route::get('app/citas/show/{id}', 'DatesController@show');
Route::get('app/citas/edit/{id}', 'DatesController@edit');
Route::post('app/citas/edit/{id}', 'DatesController@update');
Route::post('app/citas/sugestMedic', 'DatesController@sugestMedic');
Route::get('app/citas/delete/{id}', 'DatesController@delete');

Route::get('app/recetas', 'RecipesController@list');
Route::get('app/recetas/create', 'RecipesController@create');
Route::post('app/recetas/deleteDescription', 'RecipesController@deleteDescription');
Route::post('app/recetas/createDescription', 'RecipesController@saveDescription');
Route::get('app/recetas/show/{id}', 'RecipesController@show');
Route::get('app/recetas/PDF/{id}', 'RecipesController@getPDF');
Route::get('app/recetas/delete/{id}', 'RecipesController@delete');
Route::get('app/recetas/crearDescription/{id}', 'RecipesController@description');
Route::get('app/recetas/crearDescription/{id}/getDescriptions', 'RecipesController@getDescriptions');
Route::post('app/recetas/create/getSugest', 'RecipesController@sugest');
Route::post('app/recetas/create', 'RecipesController@store');

Route::get('app/misCitas', 'PatientController@dates');
Route::get('app/misRecetas', 'PatientController@recipes');
Route::get('app/misRecetas/{id}', 'PatientController@pdfRecipe');
Route::get('app/crearCita', 'PatientController@createDate');
Route::post('app/crearCita', 'PatientController@storeDate');
Route::get('app/misRecetas/{id}/accidente', 'PatientController@accidenteForm');
Route::post('app/misRecetas/{id}/accidente', 'PatientController@storeObservation');

Route::get('app/getNotifications', 'NotificationsController@get');
Route::get('app/setReadNotifications', 'NotificationsController@setReadNotifications');

Route::get('/', function () {
    return view('visitor/index');
});

Route::get('/quienes', function () {
    return view('visitor/quienes');
});

Route::get('/contacto', function () {
    return view('visitor/contacto');
});

Route::get('/especialidades', function () {
    return view('visitor/especialidades');
});

Route::get('/ubicacion', function () {
    return view('visitor/ubicacion');
});

// Auth::routes();

Route::get('/login', 'VisitorController@checkAuth');
Route::post('/login', 'VisitorController@login');
Route::get('/logout', 'VisitorController@logout');

Route::get('/resetPassword', 'VisitorController@resetPassword');
Route::post('/resetPassword', 'VisitorController@sentTokenReset');

Route::get('/resetPassword/{token}', 'VisitorController@resetPassword2');
Route::post('/resetPassword/{token}', 'VisitorController@updatePassword');

Route::get('aplicacion/verificarReceta/{id}', 'VisitorController@validateReceipt');