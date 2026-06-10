<?php

use app\views\front\Viewer;

require __DIR__ . "/../bootstrap.php";
require __DIR__ . '/../app/core/Router.php';

$path = trim(str_replace("loyalty_club/", "", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), "/");
$method = $_SERVER['REQUEST_METHOD'];



if (isset($routes[$method][$path])) {

    $info = $routes[$method][$path];
    $controller = new $info['controller'];

    if ($method === 'POST') {
        $controller->{$info['method']}($_POST);
    } else {
        $controller->{$info['method']}();
    }

} else {
    $viewer = new Viewer();
    $viewer->render404("errors/404.php");
}
?>