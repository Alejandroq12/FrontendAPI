<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::controller(Signin::class)->group(function()
    {
        Route::get('/signin', 'index');
        Route::post('/signin', 'authenticate');
    }
);

Route::controller(Signup::class)->group(function()
{
    Route::post('/register', 'register');
    Route::get('/signup', 'index');
});

Route::controller(CreateVaccine::class)->group(function()
{
    Route::post('/registerVaccine', 'register')->middleware('Auth');
    Route::get('/create_vaccine', 'index')->middleware('Auth');
});

Route::get('/',[IndexController::class,'index']);

Route::group(['prefix' => '/state', 'middleware' => ['Auth']] ,function ()
{   
    Route::get('/{id}',[PopulationUpdate::class,'get']);
    Route::post('/update',[PopulationUpdate::class,'update']);
    Route::post('/deleteState',[PopulationUpdate::class,'destroy']);
});

Route::post('state/city',[StateController::class,'states']);

Route::group(['prefix' => '/vaccine', 'middleware' => ['Auth']] ,function ()
{
    Route::get('/{id}',[VaccineUpdate::class,'get']);
    Route::post('/update',[VaccineUpdate::class,'update']);
    Route::post('/deleteVaccine',[VaccineUpdate::class,'destroy']);
});

Route::controller(CreatePopulation::class)->group(function()
{
    Route::post('/registerPopulation', 'register')->middleware('Auth');
    Route::get('/create_population', 'index')->middleware('Auth');
});

Route::get('/signout',[Signout::class,'signOut'])->middleware('Auth');

Route::group(['prefix' => '/'],function ()
{
    Route::get('vaccines',[IndexController::class,'returnViewVaccines']);
    Route::get('states',[IndexController::class,'returnViewStates']);
    Route::get('pdf',[PDFGeneratorController::class,'index']);
});