<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Lukasoppermann\Httpstatus\Httpstatuscodes;

abstract class TestCase extends BaseTestCase implements Httpstatuscodes
{


    protected $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://draw-api/api/',
            'exceptions' => false,
        ]);
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }
}
