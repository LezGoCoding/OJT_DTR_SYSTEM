<?php
require_once("include/initialize.php");
global $mydb;

if (!isset($_SESSION['ACCOUNT_ID'])) {
    header("Location: module/login.php");
} else {

$routes = [
    'dashboard' => 'module/dashboard.php'
];

$routeHandler = new RouteHandler($routes, 'dashboard');
$content = $routeHandler->handleRouteAndContent();
$routeHandler->addToGet();

require_once("theme/template.php");
}
?>
