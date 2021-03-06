<?php

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

$app->get('/', "HomeController@welcome");

$app->get('/primeFactors', "PrimeFactorController@primeFactors");

$app->get('/primeFactors/ui', "PrimeFactorController@doUi");

$app->get('/ping', "PingController@ping");

$app->get('/astroport', "AstroportController@astroport");

$app->get('/minesweeper', 'MinesweeperController@go');
