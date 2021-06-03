<?php

namespace Core;

class Router {
    private static $routes;

    public static function connect($url, $route = []) {
        self::$routes[$url] = $route;
    }

    public static function getStatic($url) {
        return self::$routes[$url];
    }
    
}