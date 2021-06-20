<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Controllers\BaseController;
use App\Contracts\Services\IDrawWinnersService;


class DrawWinnersController extends BaseController
{

    private $drawWinnersService;

    public function __construct(IDrawWinnersService $drawWinnersService)
    {
        $this->drawWinnersService = $drawWinnersService;
    }


    public function findBySession($id)
    {
        return $this->drawWinnersService->findBySession($id);
    }


    public function findAll()
    {
        return $this->drawWinnersService->findAll();
    }
}
