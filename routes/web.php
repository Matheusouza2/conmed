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
Route::get('/admin/pacientes', 'PatientController@listPatient')->name('listPatient');
Route::get('/admin/pacientesJson', 'PatientController@listPatientJson')->name('listPatientJson');
Route::get('/admin/pacientes/novo', 'PatientController@viewFormPatient')->name('formPatient');
Route::post('/admin/pacientes/storePatient', 'PatientController@storePatient')->name('storePatient');
Route::get('/admin/pacientes/editar/{patient}', 'PatientController@viewEditPatient')->name('viewEditPatient');
Route::put('/admin/pacientes/edit/{patient}', 'PatientController@editPatient')->name('editPatient');
Route::delete('/admin/delPatient/{patient}', 'PatientController@delPatient')->name('delPatient');


/**
 * ROTAS RESPONSAVEIS PELOS MEDICOS
 */
Route::get('/medicos', 'DoctorController@listDoctors')->name('listDoctors');
Route::get('/medicosJson', 'DoctorController@listDoctorsJson')->name('listDoctorsJson');