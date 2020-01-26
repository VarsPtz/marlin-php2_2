<?php
    //Start a Session
    if( !session_id() ) @session_start();

    require "../vendor/autoload.php";

//    d($_SERVER);

    $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//        $r->addRoute('GET', '/users', 'get_all_users_handler');

        //controller name -> HomeController,  method -> index
//        $r->addRoute('GET', '/users', ['HomeController', 'index']);
        $r->addRoute('GET', '/users', ['App\controllers\HomeController', 'index']);

        // {id} must be a number (\d+)
//        $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
        $r->addRoute('GET', '/user/{id:\d+}', ['App\controllers\HomeController', 'index']);

        //users/5/company/classes/school/4
        $r->addRoute('GET', '/users/{id:\d+}/company/classes/{number:\d+}', ['App\controllers\HomeController', 'about']);

        // The /{title} suffix is optional
        $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
    });

    // Fetch method and URI from somewhere
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    // Strip query string (?foo=bar) and decode URI
    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);

    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            // ... Page not found - 404 Not Found
            echo "404";
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            // ... 405 Method Not Allowed
            echo "метод не разрешён";
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];
//            d($handler, $vars);exit;
//            $class = $handler[0];
//            $method = $handler[1];

            // ... call $handler with $vars

            // call_user_func('name_of_calling_function');

            // or
//            call_user_func($handler, $vars);
//            d($handler[0]);exit();
            $controller = new $handler[0];
//            $controller->index(123);
//            d($controller);exit();
            call_user_func([$controller, $handler[1]], $vars);
            break;
    }

//    function name_of_calling_function() {
//        echo 123;
//    }

    // or

//    function get_all_users_handler($vars) {
//        d($vars);
//    }

//    /user/1
//    function get_user_handler($vars) {
//        d($vars['id']);
//    }


?>