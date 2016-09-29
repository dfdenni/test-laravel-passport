<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/connect', function () {
    $query = http_build_query([
        'client_id'     => '3',
        'redirect_uri'  => env('APP_URL', 'http://mylaravel.app') . '/redirect',
        'response_type' => 'code',
        'scope'         => 'write email',
    ]);

    return redirect(env('APP_URL', 'http://mylaravel.app') . '/oauth/authorize?'.$query);
});

Route::get('/redirect', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post(env('APP_URL', 'http://mylaravel.app') . '/oauth/token', [
        'form_params'       => [
            'grant_type'    => 'authorization_code',
            'client_id'     => '3',
            'client_secret' => 'SI29XvCUozLhWgDoBE3uvSNkz3eMsAerzD4PkWnS',
            'redirect_uri'  => env('APP_URL', 'http://mylaravel.app') . '/redirect',
            'code'          => $request->query->get('code'),
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

Route::get('/connect-password-grant', function () {

    $http = new GuzzleHttp\Client;

    $response = $http->post(env('APP_URL', 'http://mylaravel.app') . '/oauth/token', [
        'form_params'       => [
            'grant_type'    => 'password',
            'client_id'     => '2',
            'client_secret' => 'Bd6udZonROgKbKKpzgxdJnVU8u6qJr1kRwTS2Jo3',
            'username'      => 'admin@mylaravel.app',
            'password'      => 'password',
            'scope'         => 'write email',
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});
