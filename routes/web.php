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

Route::get('/conges/rapport','congeController@rapport');
Route::get('/conges/filterByYear/{year}','congeController@filterByYear');

Route::get('/home', 'HomeController@index');
Route::resource('/conges','congeController');
Route::resource('/users','UserController');
Route::resource('/permissions','permissionController');
Route::resource('/roles','roleController');
Route::resource('/docs_administratifs','docs_administratifController');
Route::resource('/free_days','free_daysController');
Route::resource('/Entreprise','entrepriseController');

Route::get('/conges/{id}/accepter','congeController@accepter_conge');
Route::get('/conges/{id}/Refuser','congeController@Refuser_conge');


Route::post('/docs_administratifs/envoyer','docs_administratifController@envoyer');

View::composer(['layouts.app'],function ($view){

    $restes=\App\Conge::all()->where('etat','Congé accepter par système' or 'Refusé par système' )
                             ->where('etat_Admin','');

    $docs=\App\Docs_administratif::all()->where('etat','En attente');
    $Entreprise=\App\Entreprise::find(1);
    $view->with('restes',$restes)->with('docs',$docs)->with('Entreprise',$Entreprise);

});