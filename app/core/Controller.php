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

    /**
     * redirect to desired path
     * @param string $relative_path
     * @return void
     */
    public function redirect(string $path): void
    {
        header('Location: ' . URL . $path);
    }

    /**
     * import view
     * @param string $path
     * @param array $data
     * @return void
     */
    public function view(string $path, array $data = []): void
    {
        require 'views/' . $path . 'View.php';
    }

    /**
     * import header
     * @param string $path
     * @return void
     */
    public function header(string $path): void
    {
        require "views/layout/" . $path . "View.php";
    }

    /**
     * import footer
     * @param string $path
     * @return void
     */
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
    public function model(string $model_name):object
    {
        $filename = $model_name . 'Model';
        require_once 'app/models/' . $filename . '.php';
        return new $filename;
    }
}
