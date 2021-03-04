<?php
if (App::environment('production')) {
    URL::forceScheme('https');
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
* ROTA INICIAL
*/
Route::get('/', 'LoginController@telaLogin')->name('telaLogin');

/**
 * ROTA RESPONSAVEL PELO DASHBOARD
 */
Route::get('/admin', 'DashboardController@telaInicial')->name('telaInicial');

/** 
* ROTAS RESPONSAVEIS PELO PACIENTE
*/
Route::get('/admin/cadastroPaciente', 'PatientController@viewFormPatient')->name('formPatient');
Route::get('/admin/paciente', 'PatientController@listPatient')->name('listPatient');
Route::post('/admin/savePatient', 'PatientController@savePatient')->name('savePatient');
Route::put('/admin/updatePatient', 'PatientController@updatePatient')->name('updatePatient');
Route::delete('/admin/delPatient', 'PatientController@delPatient')->name('delPatient');


/**
 * ROTAS RESPONSAVEIS PELAS HOUSES
 */
Route::post('/saveHouse', 'HouseController@saveHouse')->name('saveHouse');