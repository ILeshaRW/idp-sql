<?php

namespace App\Views;

use Jenssegers\Blade\Blade;

class BaseView
{
    public static function getTemplate(string $view, array $data = []): string
    {
        $blade = new Blade($_SERVER['DOCUMENT_ROOT'] . '/resources/views', $_SERVER['DOCUMENT_ROOT'] . '/cache');

        return $blade->render($view, $data);
    }
}