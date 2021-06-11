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


            $api->post('prize', [
                'as' => 'prize.create',
                'uses' => 'PrizeController@create',
            ]);

            $api->delete('prize/{id}', [
                'as' => 'prize.delete',
                'uses' => 'PrizeController@delete',
            ]);

            $api->get('prize', [
                'as' => 'prize.findAll',
                'uses' => 'PrizeController@findAll',
            ]);

            $api->get('prize/{id}', [
                'as' => 'prize.find',
                'uses' => 'PrizeController@find',
            ]);


            /**
             * Payment Providers Route
             */

            $api->get('payment_providers', [
                'as' => 'payment_providers.findAll',
                'uses' => 'PaymentProvidersController@findAll',
            ]);

            $api->get('payment_providers/{id}', [
                'as' => 'payment_providers.find',
                'uses' => 'PaymentProvidersController@find',
            ]);



            /**
             * Banks Route
             */

            $api->get('banks', [
                'as' => 'banks.findAll',
                'uses' => 'BanksController@findAll',
            ]);

            $api->get('banks/{id}', [
                'as' => 'banks.find',
                'uses' => 'BanksController@find',
            ]);



            /**
             * Buy Ticket Route
             */

            $api->post('buy_ticket', [
                'as' => 'buy_ticket.create',
                'uses' => 'BuyTicketController@create',
            ]);

            /**
             * Nuban Verify Account No Route
             */

            $api->post('verify_account', [
                'as' => 'nuban.verify',
                'uses' => 'NubanVerifyController@verify',
            ]);


            /**
             * Fund Wallet Route
             */

            $api->post('fund_wallet', [
                'as' => 'wallet.fund',
                'uses' => 'FundWalletController@fund',
            ]);
        });


        /**
         * Admin Route
         */
        $api->group(['middleware' => ['auth:api', 'scopes:user']], function ($api) {


            /**
             * Package Route
             */


            $api->post('package', [
                'as' => 'package.create',
                'uses' => 'PackageController@create',
            ]);

            $api->put('package/{id}', [
                'as' => 'package.update',
                'uses' => 'PackageController@update',
            ]);

            $api->get('package', [
                'as' => 'package.findAll',
                'uses' => 'PackageController@findAll',
            ]);

            $api->get('package/{id}', [
                'as' => 'package.find',
                'uses' => 'PackageController@find',
            ]);


            /**
             * Package Options Route
             */


            $api->post('package_options', [
                'as' => 'package_option.create',
                'uses' => 'PackageOptionsController@create',
            ]);

            $api->put('package_options/{id}', [
                'as' => 'package.update',
                'uses' => 'PackageOptionsController@update',
            ]);

            $api->get('package_options', [
                'as' => 'package_options.findAll',
                'uses' => 'PackageOptionsController@findAll',
            ]);

            $api->get('package_options/{id}', [
                'as' => 'package_options.find',
                'uses' => 'PackageOptionsController@find',
            ]);

            $api->delete('package_options/{id}', [
                'as' => 'package_options.delete',
                'uses' => 'PackageOptionsController@delete',
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
