<?php
    require_once("include/initialize.php");
    global $mydb;

    if (!isset($_SESSION['ACCOUNT_ID'])) {
        header("Location: module/login.php");
    } else {

    $isAdmin = isset($_SESSION['ACCOUNT_USERNAME']) && $_SESSION['ACCOUNT_USERNAME'] === 'admin';
    if ($isAdmin){
        $routes = [
            'dashboard' => 'module/admin_dashboard.php'
        ];
    } else {
        $routes = [
            'dashboard' => 'module/employee_dashboard.php'
        ];
    }

    $routeHandler = new RouteHandler($routes, 'dashboard');
    $content = $routeHandler->handleRouteAndContent();
    $routeHandler->addToGet();

    require_once("theme/template.php");
    }
?>
