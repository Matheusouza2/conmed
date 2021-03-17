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
 * ROTA RESPONSAVEL PELO DASHBOARD ADMINISTRATIVO
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
Route::get('/admin/medicos', 'DoctorController@listDoctors')->name('listDoctors');
Route::get('/admin/medicosJson', 'DoctorController@listDoctorsJson')->name('listDoctorsJson');
Route::get('/admin/medicos/novo', 'DoctorController@viewFormDoctor')->name('formDoctor');
Route::get('/admin/medicos/editar/{doctor}', 'DoctorController@viewEditDoctor')->name('viewEditDoctor');
Route::post('/admin/medicos/storeDoctor', 'DoctorController@storeDoctor')->name('storeDoctor');
Route::put('/admin/medicos/edit/{doctor}', 'DoctorController@editDoctor')->name('editDoctor');
Route::delete('/admin/medicos/delDoctor/{doctor}', 'DoctorController@editDoctor')->name('delDoctor');

/**
 * ROTAS DO CALENDARIO
 */
Route::view('/admin/calendario', 'admin.calendar')->name('viewCalendar');

/**
 * ROTAS DA CONSULTA
 */
Route::get('/admin/appointment/listToday', 'AppointmentController@listAppointment')->name('listAppointment');
Route::get('/admin/appointment/listStatus', 'AppointmentController@listAppointmentStatus')->name('listAppointmentStatus');
Route::get('/admin/appointment/consultaJson', 'AppointmentController@listAppointmentJson')->name('listAppointmentJson');
Route::get('/admin/appointment/showEspecific', 'AppointmentController@show')->name('show');
Route::post('/admin/appointment/storeConsulta', 'AppointmentController@store')->name('storeAppointment');
Route::put('/admin/appointment/update', 'AppointmentController@update')->name('updateAppointment');

/**
* ROTA RESPONSAVEL PELA TELA DE ATENDIMENTO MEDICO
*/
Route::view('/atendimento', 'doctor.atendimento')->name('atendimentoView');
