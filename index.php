<?php

use Components\Router;
use Controllers\AjaxController;

// General settings
ini_set("display_errors", 1);
error_reporting(E_ALL);
define("ROOT", dirname(__FILE__));
require_once(ROOT . "/vendor/autoload.php");

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    AjaxController::ajaxResponse();
} else {
    $router = new Router();
    $router->run();
}
