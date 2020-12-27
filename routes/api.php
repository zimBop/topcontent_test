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

Route::get('artisans', 'Api\Artisan\GetArtisanListController')->name(R_GET_ARTISAN_LIST);
Route::get('services', 'Api\Service\GetServiceListController')->name(R_GET_SERVICE_LIST);
Route::post('appointments', 'Api\Appointment\PostCreateAppointmentController')->name(R_POST_CREATE_APPOINTMENT);
