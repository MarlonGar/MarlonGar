<?php

require_once '../api/TaskController.php';

// Configurar las rutas
$request = $_SERVER['REQUEST_URI'];

$controller = new TaskController();

switch ($request) {
    case '/tasks' && $_SERVER['REQUEST_METHOD'] === 'GET':
        $controller->list();
        break;
    case '/tasks' && $_SERVER['REQUEST_METHOD'] === 'POST':
        $controller->create();
        break;
    case (preg_match('/\/tasks\/\d+/', $request) ? true : false) && $_SERVER['REQUEST_METHOD'] === 'PUT':
        $id = substr($request, 7); // Obtener el ID de la URL
        $controller->update($id);
        break;
    case (preg_match('/\/tasks\/\d+/', $request) ? true : false) && $_SERVER['REQUEST_METHOD'] === 'DELETE':
        $id = substr($request, 7); // Obtener el ID de la URL
        $controller->delete($id);
        break;
    default:
        echo json_encode(["error" => "Endpoint o método no válido"]);
        break;
}
