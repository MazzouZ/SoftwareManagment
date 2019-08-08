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
Route::get('/Profile/{id}','UserController@view_profile');
Route::PUT('/Profile/{id}','UserController@updateProfile')->name('updateProfile');

Route::get('/conges/status_salaire','CsvFile@index_status');
Route::get('/conges/status_salaire/export', 'CsvFile@csv_export')->name('export');
//------------------------------------------------
Route::get('/pointage/rapport','PointageController@index_rapport');
//-------------------------------------------------------
Route::get('/pointage/','CsvFile@index_pointage');
Route::post('/pointage/import', 'CsvFile@csv_import')->name('import');
//----------------------------------------------------------------------------------------------
Route::get('/conges/live_search', 'LiveSearch@index');
Route::get('/conges/live_search/action', 'LiveSearch@action')->name('live_search.action');
//----------------------------------------------------------------------------------------------

Route::get('/conges/rapport','congeController@rapport');
Route::get('/conges/filterByYear/{year}','congeController@filterByYear');
//----------------------------------------------------------------------------------------------

Route::get('/home', 'HomeController@index');
Route::resource('/conges','congeController');
Route::resource('/users','UserController');
Route::resource('/permissions','permissionController');
Route::resource('/roles','roleController');
Route::resource('/docs_administratifs','docs_administratifController');
Route::resource('/free_days','free_daysController');
Route::resource('/Entreprise','entrepriseController');
//----------------------------------------------------------------------------------------------

Route::get('/conges/{id}/accepter','congeController@accepter_conge');
Route::get('/conges/{id}/Refuser','congeController@Refuser_conge');
//----------------------------------------------------------------------------------------------


Route::post('/docs_administratifs/envoyer','docs_administratifController@envoyer');
Route::get('/docs_administratifs/view_attestation_travail/{id}','docs_administratifController@view_attestation_travail');
Route::get('/docs_administratifs/view_attestation_stage/{id}','docs_administratifController@view_attestation_stage');
Route::get('/docs_administratifs/view_recue_solde_compte/{id}','docs_administratifController@view_recue_solde_compte');
Route::get('/docs_administratifs/view_accuse_reception/{id}','docs_administratifController@view_accuse_reception');
//----------------------------------------------------------------------------------------------

View::composer(['layouts.app'],function ($view){

    $restes=\App\Conge::all()->where('etat','Congé accepter par système' or 'Refusé par système' )
                             ->where('etat_Admin','');

    $docs=\App\Docs_administratif::all()->where('etat','En attente');
    $Entreprise=\App\Entreprise::find(1);
    $view->with('restes',$restes)->with('docs',$docs)->with('Entreprise',$Entreprise);

});