<?php

class Database {
    // Parámetros de conexión a la base de datos
    private $host = "localhost"; // Si usas XAMPP o MAMP, esto suele ser 'localhost'
    private $db_name = "todo_app"; // Nombre de la base de datos
    private $username = "root"; // Usuario de MySQL (por defecto es 'root' en XAMPP/MAMP)
    private $password = ""; // Contraseña de MySQL (por defecto está vacía en XAMPP/MAMP)
    private $conn;

    // Método para establecer la conexión
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", 
                                  $this->username, 
                                  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
