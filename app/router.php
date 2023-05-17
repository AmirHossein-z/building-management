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
                'middleware' => ['Policy:is_login:dashboard/index'],
            ],
            'loggedIn' => [
                'type' => 'POST',
                'pattern_url' => '/^\/auth\/loggedIn$/',
                'controller' => 'authController',
                'action' => 'loggedIn',
                'middleware' => ['Policy:is_login:dashboard/index'],
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
                'middleware' => ['Policy:is_login:dashboard/index'],
            ],
            'registered' => [
                'type' => "POST",
                'pattern_url' => '/^\/auth\/registered$/',
                'controller' => 'authController',
                'action' => 'registered',
                'middleware' => ['Policy:is_login:dashboard/index'],
            ],
            'dashboardIndex' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/index$/',
                'controller' => 'dashboardController',
                'action' => 'index',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'edit_profile' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/edit_profile$/',
                'controller' => 'personController',
                'action' => 'edit_profile',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'edited_profile' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/edited_profile$/',
                'controller' => 'personController',
                'action' => 'edited_profile',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'show_building_info' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/building$/',
                'controller' => 'buildingController',
                'action' => 'index',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            "edit_building_info" => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/edit_building_info$/',
                'controller' => 'buildingController',
                'action' => 'edit',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            "edited_building_info" => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/edited_building_info\/\d{1,10}$/',
                'controller' => 'buildingController',
                'action' => 'edited',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'add_new_building' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/add_building$/',
                'controller' => 'buildingController',
                'action' => 'add',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'added_building' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/added_building$/',
                'controller' => 'buildingController',
                'action' => 'added',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'show_building_unit_info' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/building_unit$/',
                'controller' => 'buildingUnitController',
                'action' => 'index',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'building_list' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/building_list$/',
                'controller' => 'buildingController',
                'action' => 'building_list',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'building_units_list' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/building_units_list\/\d{1,10}$/',
                'controller' => 'buildingUnitController',
                'action' => 'building_units_list',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'delete_building_unit_submitted' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/delete_building_unit_submitted\/\d{1,10}$/',
                'controller' => 'buildingUnitController',
                'action' => 'delete',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'select_building_unit' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/select_building_unit$/',
                'controller' => 'buildingUnitController',
                'action' => 'select',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'manage_building_units_list' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/building_units_list_manage$/',
                'controller' => 'buildingUnitController',
                'action' => 'building_units_list_manage',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'show_bills' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/bills$/',
                'controller' => 'billController',
                'action' => 'index',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'create_bill' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/create_bill$/',
                'controller' => 'billController',
                'action' => 'create_one',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'bills_list' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/bills_list\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'bills_list',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
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
