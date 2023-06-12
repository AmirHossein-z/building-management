<?php

class Router
{
    public function __construct()
    {
        $request_type = $_SERVER['REQUEST_METHOD'];
        $url = '/' . ($_GET['url'] ?? "");

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
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            "edited_building_info" => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/edited_building_info\/\d{1,10}$/',
                'controller' => 'buildingController',
                'action' => 'edited',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'add_new_building' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/add_building$/',
                'controller' => 'buildingController',
                'action' => 'add',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'added_building' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/added_building$/',
                'controller' => 'buildingController',
                'action' => 'added',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
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
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'show_bills' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/bills$/',
                'controller' => 'billController',
                'action' => 'bills_for_member',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_member:dashboard/index'],
            ],
            'create_bill' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/create_bill\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'create',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'created_bill' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/created_bill$/',
                'controller' => 'billController',
                'action' => 'created',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'create_bill_for_all' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/create_bill_for_all\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'create_for_all',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'created_bill_for_all' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/created_bill_for_all$/',
                'controller' => 'billController',
                'action' => 'created_for_all',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'bills_list' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/bills_list\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'bills_list',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'edit_bill' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/edit_bill\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'edit',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'edited_bill' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/edited_bill\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'edited',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'delete_bill' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/delete_bill\/\d{1,10}$/',
                'controller' => 'billController',
                'action' => 'delete',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/index'],
            ],
            'accounting for a building unit' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/accounting\/\d{1,10}$/',
                'controller' => 'accountingController',
                'action' => 'building_unit_accounting',
                'middleware' => ['Policy:is_not_login:auth/login', 'Policy:not_manager:dashboard/accounting'],
            ],
            'show accounting' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/accounting/',
                'controller' => 'accountingController',
                'action' => 'index',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'update accounting' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/update_accounting$/',
                'controller' => 'accountingController',
                'action' => 'update_accounting',
                'middleware' => ['Policy:is_not_login:auth/login'],
            ],
            'main_page' => [
                'type' => "GET",
                'pattern_url' => '/\/$/',
                'controller' => 'indexController',
                'action' => 'main',
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
                if (isset($params[3]))
                    $params = (array) explode('/', $matches[0])[3];
                require_once 'app/controllers/' . $route['controller'] . '.php';
                $object = new $route['controller']();
                call_user_func_array([$object, $route['action']], $params);
                $page_found = true;
            }
        }

        if (!$page_found) {
            require_once 'app/controllers/indexController.php';
            $object = new indexController();
            $object->not_found();
        }
    }
}