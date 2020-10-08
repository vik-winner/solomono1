<?php

namespace Components;

/**
 * Class Router
 */
class Router {
    /**
     * Contains routes
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct() {
        // Get routes form settings file
        $this->routes = ROUTES;
    }

    /**
     * @return string
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return '';
    }

    /**
     * Choose controller for routes
     */
    public function run() {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $arguments = explode('/', $path);

                $controllerName = array_shift($arguments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $controllerName = "\Controllers\\$controllerName";

                $methodName = array_shift($arguments);

                $controllerObject = new $controllerName;
                $result = $controllerObject->$methodName();
                if ($result != null) {
                    break;
                }
            }
        }

    }
}
