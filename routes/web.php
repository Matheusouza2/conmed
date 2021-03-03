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
Route::get('/', 'DashboardController@telaInicial')->name('telaInicial');

/** 
* ROTAS RESPONSAVEIS PELO GROUND
*/
Route::post('/saveGround', 'GroundController@saveGround')->name('saveGround');


/**
 * ROTAS RESPONSAVEIS PELAS HOUSES
 */
Route::post('/saveHouse', 'HouseController@saveHouse')->name('saveHouse');