<?php
    //Start a Session
    if( !session_id() ) @session_start();

    require "../vendor/autoload.php";

//    d($_SERVER);

    $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//        $r->addRoute('GET', '/users', 'get_all_users_handler');

        //controller name -> HomeController,  method -> index
        $r->addRoute('GET', '/users', ['HomeController', 'index']);

        // {id} must be a number (\d+)
        $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
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
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            // ... 405 Method Not Allowed
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];
            $class = $handler[0];
            $method = $handler[1];


//            d($handler);exit;

            // ... call $handler with $vars

            // call_user_func('name_of_calling_function');
            // or
            call_user_func($handler, $vars);
            break;
    }

//    function name_of_calling_function() {
//        echo 123;
//    }

    // or

    function get_all_users_handler($vars) {
//        echo 123;
        d($vars);
    }

    function get_user_handler($vars) {
        d($vars['id']);
    }
?>