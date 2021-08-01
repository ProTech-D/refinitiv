<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Credentials: true');

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('all',  ['uses' => 'BenchmarkController@showAll']);
  $router->get('industry',  ['uses' => 'BenchmarkController@showIndustry']);
  $router->get('countries',  ['uses' => 'BenchmarkController@showCountries']);
  $router->get('industry/{TRBC}',  ['uses' => 'BenchmarkController@showByInd']);
  $router->get('filter/{TRBC}/{country}/{name}',  ['uses' => 'BenchmarkController@filterByIndCountry']);
  $router->get('company/{name}',  ['uses' => 'BenchmarkController@showByCompany']);
  $router->get('companyid/{id}',  ['uses' => 'BenchmarkController@rankCompany']);

});