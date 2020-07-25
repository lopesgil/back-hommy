<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas da CRUD de locador
Route::post('createLandlord', 'LandlordController@createLandlord');
Route::get('showLandlord/{id}', 'LandlordController@showLandlord');
Route::get('listLandlords', 'LandlordController@listLandlords');
Route::put('updateLandlord/{id}', 'LandlordController@updateLandlord');
Route::delete('deleteLandlord/{id}', 'LandlordController@deleteLandlord');

// Rotas da CRUD de anúncios
Route::post('createAd', 'AdController@createAd');
Route::get('showAd/{id}', 'AdController@showAd');
Route::get('listAds', 'AdController@listAds');
Route::put('updateAd/{id}', 'AdController@updateAd');
Route::delete('deleteAd/{id}', 'AdController@deleteAd');

// Rotas da CRUD de locatário
Route::post('createTenant', 'TenantController@createTenant');
Route::get('showTenant/{id}', 'TenantController@showTenant');
Route::get('listTenants', 'TenantController@listTenants');
Route::put('updateTenant/{id}', 'TenantController@updateTenant');
Route::delete('deleteTenant/{id}', 'TenantController@deleteTenant');

// Rotas de relacionamento do locatário
Route::put('chooseAd/{id}/{ad_id}', 'TenantController@chooseAd');
Route::put('unchooseAd/{id}', 'TenantController@unchooseAd');
