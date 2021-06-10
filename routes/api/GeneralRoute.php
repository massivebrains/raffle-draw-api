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



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$api = app('Dingo\Api\Routing\Router');
$api->version(
    'v1',
    [
        'namespace' => 'App\Api\V1\Controllers'
    ],
    function ($api) {



        $api->group(['middleware' => ['auth:api', 'scopes:user']], function ($api) {

            /**
             * Users Route
             */

            $api->get('user', [
                'as' => 'authorization.user',
                'uses' => 'UserController@findAll',
            ]);

            $api->get('user/{id}', [
                'as' => 'authorization.show',
                'uses' => 'UserController@find',
            ]);

            $api->put('user/{id}', [
                'as' => 'user.update',
                'uses' => 'UserController@update',
            ]);

            /**
             * Prize Route
             */
            $api->get('ads', [
                'as' => 'ads.findall',
                'uses' => 'AdsController@findAll',
            ]);

            $api->get('ads/{id}', [
                'as' => 'ads.find',
                'uses' => 'AdsController@findOne',
            ]);

            $api->get('ads_page_data', [
                'as' => 'ads.pagedata',
                'uses' => 'AdsController@pageData',
            ]);

            $api->post('prize', [
                'as' => 'prize.create',
                'uses' => 'PrizeController@create',
            ]);

            $api->delete('prize/{id}', [
                'as' => 'prize.delete',
                'uses' => 'PrizeController@delete',
            ]);

            $api->put('ads/visit', [
                'as' => 'ads.visit',
                'uses' => 'AdsController@updateVisit',
            ]);
        });



        /**
         * Auth route
         */
        $api->post('user', [
            'as' => 'authorizations.register',
            'uses' => 'UserController@register',
        ]);

        $api->post('login', [
            'as' => 'authorization.login',
            'uses' => 'UserController@login',
        ]);
    }
);
