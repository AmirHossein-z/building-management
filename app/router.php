<?php

class Router
{
    public function __construct()
    {
        $request_type = $_SERVER['REQUEST_METHOD'];
        $url = '/' . ( $_GET['url'] ?? "");

        $routes = [
            'login' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/login$/',
                'controller' => 'authController',
                'action' => 'login',
                // 'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'loggedIn' => [
                'type' => 'POST',
                'pattern_url' => '/^\/auth\/loggedIn$/',
                'controller' => 'authController',
                'action' => 'loggedIn',
                // 'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'logout' => [
                'type' => 'GET',
                'pattern_url' => '/^\/auth\/logout$/',
                'controller' => 'authController',
                'action' => 'logout',
            ],
            'register' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/register$/',
                'controller' => 'authController',
                'action' => 'register',
                // 'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'registered' => [
                'type' => "POST",
                'pattern_url' => '/^\/auth\/registered$/',
                'controller' => 'authController',
                'action' => 'registered',
                // 'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'dashboardIndex' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/index$/',
                'controller' => 'dashboardController',
                'action' => 'index',
                // 'middleware' => ['personPolicy:is_login:dashboard/index'],
            ]
        ];

        $page_found = false;
        foreach ($routes as $route) {
            if (
                preg_match(
                    $route['pattern_url'],
                    $url,
                    $matches
                ) && $request_type == $route['type']
            ) {
                
                //middleware check
                if (isset($route['middleware']) && $route['middleware'] != '') {
                    foreach ($route['middleware'] as $middleware) {
                        $result = explode(':', $middleware);
                        $middleware_class = $result[0];
                        $middleware_action = $result[1];
                        $param = (array) $result[2];

                        require_once 'app/middleware/' . $middleware_class . '.php';
                        $object = new $middleware_class();
                        call_user_func_array([$object, $middleware_action], $param);
                    }
                }
                $params = (array) explode('/', $matches[0]);
                if(isset($params[3]))
                    $params = (array) explode('/', $matches[0])[3];
                require 'app/controllers/' . $route['controller'] . '.php';
                $object = new $route['controller']();
                call_user_func_array([$object, $route['action']], $params);
                $page_found = true;
            }
        }

        // if user are in /, show main page
        if ($url === '/') {
            require_once 'app/controllers/indexController.php';
            $object = new indexController();
            $object->main();
            $page_found = true;
        }

        // if page doesn't found,show 404 page
        if(!$page_found) {
            require_once 'app/controllers/indexController.php';
            $object = new indexController();
            $object->not_found();
        }

    }
}
