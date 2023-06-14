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
        require_once 'views/' . $path . 'View.php';
    }

    public function header(string $path, string $title): void
    {
        require_once "views/layout/" . $path . "View.php";
    }

    public function footer(string $path): void
    {
        require_once "views/layout/" . $path . "View.php";
    }

    public function model(string $model_name): object
    {
        $filename = $model_name . 'Model';
        require_once 'app/models/' . $filename . '.php';
        return new $filename;
    }
}