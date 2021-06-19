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
                'as' => 'ticket.buy',
                'uses' => 'BuyTicketController@create',
            ]);




            /**
             * Subscription Route
             */

            $api->get('subscription_freq', [
                'as' => 'subscribe.freq',
                'uses' => 'RoutineFrequencyController@findAll',
            ]);

            $api->get('subscription', [
                'as' => 'subscribe.findAll',
                'uses' => 'RoutineController@findAll',
            ]);

            $api->get('subscription/{id}', [
                'as' => 'subscribe.find',
                'uses' => 'RoutineController@find',
            ]);

            $api->post('subscription', [
                'as' => 'subscribe.create',
                'uses' => 'RoutineController@create',
            ]);

            $api->delete('subscription/{id}', [
                'as' => 'subscribe.delete',
                'uses' => 'RoutineController@delete',
            ]);

            $api->put('subscription/{id}', [
                'as' => 'subscribe.disable',
                'uses' => 'RoutineController@disable',
            ]);


            /**
             * Shuffle / Draw Ticket Route
             */
            $api->group(['middleware' => [
                'check_winner_complete',
            ]], function ($api) {


                $api->post('shuffle_ticket', [
                    'as' => 'ticket.shuffle',
                    'uses' => 'BuyTicketController@shuffleTicket',
                ]);

                $api->post('draw_ticket', [
                    'as' => 'ticket.draw',
                    'uses' => 'BuyTicketController@drawTicket',
                ]);
            });

            /**
             * Nuban Verify Account No Route
             */

            $api->post('verify_account', [
                'as' => 'nuban.verify',
                'uses' => 'NubanVerifyController@verify',
            ]);


            /**
             *  Wallet Route
             */
            $api->group(['middleware' => [
                'min_max_deposit',
            ]], function ($api) {
                $api->post('fund_wallet', [
                    'as' => 'wallet.fund',
                    'uses' => 'FundWalletController@fund',
                ]);
            });



            $api->group(['middleware' => [
                'min_balance',
                'min_max_withdraw',
            ]], function ($api) {
                $api->post('wallet_withdraw', [
                    'as' => 'wallet.withdraw',
                    'uses' => 'WithdrawController@withdraw',
                ]);
            });

            $api->get('wallet_self', [
                'as' => 'wallet.self',
                'uses' => 'FundWalletController@findSelf',
            ]);

            $api->get('wallet/{id}', [
                'as' => 'wallet.find',
                'uses' => 'FundWalletController@find',
            ]);

            $api->get('wallet', [
                'as' => 'wallet.findAll',
                'uses' => 'FundWalletController@findAll',
            ]);


            /**
             * Game Session Route
             */

            $api->get('game_session', [
                'as' => 'session.findAll',
                'uses' => 'GameSessionController@findAll',
            ]);

            $api->get('game_session/{id}', [
                'as' => 'session.find',
                'uses' => 'GameSessionController@find',
            ]);

            $api->get('game_session_active', [
                'as' => 'session.findAll',
                'uses' => 'GameSessionController@findAllActive',
            ]);



            /**
             * Draw Winners Route
             */

            $api->get('draw_winners', [
                'as' => 'draw.findAll',
                'uses' => 'DrawWinnersController@findAll',
            ]);

            $api->get('draw_winners/{id}', [
                'as' => 'draw.findBySession',
                'uses' => 'DrawWinnersController@findBySession',
            ]);


            /**
             * User Account Details / Bank Account Route
             */


            $api->post('bank_account', [
                'as' => 'bank_account.create',
                'uses' => 'UserAccountDetailController@create',
            ]);

            $api->get('bank_account', [
                'as' => 'bank_account.findAll',
                'uses' => 'UserAccountDetailController@findAll',
            ]);

            $api->get('bank_account_self', [
                'as' => 'bank_account.findAllSelf',
                'uses' => 'UserAccountDetailController@findAllByOwner',
            ]);

            $api->get('bank_account/{id}', [
                'as' => 'bank_account.find',
                'uses' => 'UserAccountDetailController@find',
            ]);

            $api->delete('bank_account/{id}', [
                'as' => 'bank_account.delete',
                'uses' => 'UserAccountDetailController@delete',
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
         * Verification Route
         */

        $api->post('resend_verify_code', [
            'as' => 'verify.resend',
            'uses' => 'VerificationController@resendEmail',
        ]);


        $api->post('email_verify_code/{code}', [
            'as' => 'verify.verify',
            'uses' => 'VerificationController@verifyEmail',
        ]);


        $api->get('view/reg', [
            'as' => 'view.reg',
            'uses' => 'MailViewController@reg',
        ]);

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
