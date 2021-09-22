<?php

namespace App\Http\Controllers;

use App\Application;
use App\Views\BaseView;
use Laminas\Diactoros\Response;

class LessonsController
{
    public function getLessons(): Response
    {
        $response = new Response();

        $response->getBody()->write(BaseView::getTemplate('index'));

        return $response;
    }
}