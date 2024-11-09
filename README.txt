# Proyecto To-Do List

## Descripción
Este es un proyecto de lista de tareas desarrollado con PHP y MySQL en el backend, y HTML/JavaScript en el frontend.

## Requisitos
- XAMPP (Apache y MySQL)
- Navegador web

## Instalación
1. Clona o copia el proyecto en el directorio `htdocs` de XAMPP.
2. Crea la base de datos ejecutando el script SQL en phpMyAdmin.
3. Asegúrate de que Apache y MySQL están activados en XAMPP.

## Ejecución
1. Accede a `http://localhost/todo-app/public/index.html` en tu navegador para interactuar con la lista de tareas.
2. Utiliza los botones para agregar, actualizar y eliminar tareas.

## Pruebas
- Prueba la API con Postman o un cliente REST, utilizando los endpoints `GET`, `POST`, `PUT`, y `DELETE` para realizar las operaciones CRUD en `/tasks`.

## Script base de datos
CREATE DATABASE IF NOT EXISTS todo_app;

USE todo_app;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status BOOLEAN NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

##Estructura del proyecto:
/todo-app
    /public
        index.php
    /api
        TaskController.php
        TaskModel.php
        Database.php
    /config
        config.php
    /sql
        schema.sql
    .htaccess
