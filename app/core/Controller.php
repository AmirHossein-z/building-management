<?php

class Controller
{
    public function __construct()
    {

    }

    public function alert(string $message, string $type)
    {
        $_SESSION['alert']['message'] = $message;
        $_SESSION['alert']['type'] = $type;
        return;
    }

    public function redirect(string $path): void
    {
        header('Location: ' . URL . $path);
    }

    public function view(string $path, array $data = []): void
    {
        require 'views/' . $path . 'View.php';
    }

    public function header(string $path): void
    {
        require "views/layout/" . $path . "View.php";
    }

    public function footer(string $path): void
    {
        require "views/layout/" . $path . "View.php";
    }

    /**
     * require navbar
     * @param string $path
     * @return void
     */
    public function navbar(string $path): void
    {
        require 'views/layout/' . $path . '.php';
    }

    /**
     * import DB model
     * @param string $model_name
     * @return object
     */
    public function model(string $model_name): object
    {
        $filename = $model_name . 'Model';
        require_once 'app/models/' . $filename . '.php';
        return new $filename;
    }
}