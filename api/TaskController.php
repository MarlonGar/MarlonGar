<?php
require_once 'TaskModel.php';

class TaskController {

    public function create() {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->title) && isset($data->description)) {
            $task = new TaskModel();
            $task->create($data->title, $data->description);
            echo json_encode(["message" => "Task creado exitosamente"]);
        } else {
            echo json_encode(["error" => "Titulo y descripcion requerida"]);
        }
    }

    public function list() {
        $task = new TaskModel();
        $tasks = $task->getAll();
        echo json_encode($tasks);
    }

    public function update($id) {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->title) && isset($data->description)) {
            $task = new TaskModel();
            $task->update($id, $data->title, $data->description);
            echo json_encode(["message" => "Task creado exitosamente"]);
        } else {
            echo json_encode(["error" => "Titulo y descripcion requerida"]);
        }
    }

    public function delete($id) {
        $task = new TaskModel();
        $task->delete($id);
        echo json_encode(["message" => "Tarea eliminada correctamente"]);
    }
    
}
