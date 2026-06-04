<?php

require_once 'classUser.php';

class UserDAO {
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para insertar (Registrar) un usuario
    public function create(User $user) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nombre_completo, fecha_nacimiento, telefono, direccion, nickname, password) 
                  VALUES 
                  (:nombre, :fecha, :telefono, :direccion, :nickname, :password)";
        
        $stmt = $this->conn->prepare($query);

        // Encriptar la contraseña sigue siendo vital por seguridad
        $hashedPassword = password_hash($user->password, PASSWORD_BCRYPT);

        // Enlazar los datos limpios. 
        $stmt->bindValue(":nombre", htmlspecialchars(strip_tags($user->nombre_completo)));
        $stmt->bindValue(":fecha", htmlspecialchars(strip_tags($user->fecha_nacimiento))); 
        $stmt->bindValue(":telefono", htmlspecialchars(strip_tags($user->telefono)));
        $stmt->bindValue(":direccion", htmlspecialchars(strip_tags($user->direccion)));
        $stmt->bindValue(":nickname", htmlspecialchars(strip_tags($user->nickname)));
        $stmt->bindValue(":password", $hashedPassword);

        return $stmt->execute();
    }

    // Método para validar usuario (Login)
    public function validateUser($nickname, $password_ingresada) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nickname = :nickname LIMIT 1";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindValue(":nickname", $nickname);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($password_ingresada, $row['password'])) {
                return new User(
                    $row['id'], $row['nombre_completo'], $row['fecha_nacimiento'],
                    $row['telefono'], $row['direccion'], $row['nickname'], $row['password']
                );
            }
        }
        return null; 
    }
}
?>