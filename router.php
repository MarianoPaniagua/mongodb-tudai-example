<?php
header("Access-Control-Allow-Origin: *");

require_once "db_operations.php";

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; 
}

$params = explode('/', $action);

switch ($params[0]) {
  
    case 'getAll': 
        echo getAllFromDB(); 
        break;
    case 'home':
        require __DIR__ . '/index.html';
        break;
    case 'saveProduct':
        echo saveProduct($_POST);
        break;
    case 'get':
        echo get($params[1]);
        break;
    default: 
        echo('404 Page not found'); 
        break;
}
?>
