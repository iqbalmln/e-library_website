<?php

class BaseController {
    public function view($view, $data = [])
    {
        require_once "../app/views/layouts/header.php";
        require_once "../app/views/{$view}.php";
        require_once "../app/views/layouts/footer.php";
    }

    public function model($model)
    {
        require_once "../app/models/{$model}.php";
        return new $model;
    }

    public function middleware($middleware)
    {
        require_once "../app/middlewares/{$middleware}.php";
        return new $middleware;
    }
}