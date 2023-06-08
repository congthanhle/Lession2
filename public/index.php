<!-- public/index.php -->
<?php

require_once '../app/Controllers/CategoryController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$categoryController = new CategoryController();

switch ($action) {
    case 'index':
        $categoryController->index();
        break;
    case 'create':
        $categoryController->create();
        break;
    case 'edit':
        $categoryController->edit($id);
        break;
    case 'show':
        $categoryController->show($id);
        break;
    default:
        echo "404 Not Found";
        break;
}
