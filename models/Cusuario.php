<?php

class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insertar($nombre, $correo, $cedula, $fecha_nacimiento, $mensaje) {
        $sql = "INSERT INTO usuarios(nombre, correo, cedula, fecha_nacimiento, mensaje) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre, $correo, $cedula, $fecha_nacimiento, $mensaje]);
        return $stmt->rowCount();
    }
    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $usuarios = array();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }
    
        return $usuarios;
    }
    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $usuario;
    }
    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $usuarios = array();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }
    
        return $usuarios;
    }
    public function actualizar($id, $nombre, $correo, $cedula, $fecha_nacimiento, $mensaje) {
        // Preparar consulta SQL para actualizar registro
        $stmt = $this->pdo->prepare("UPDATE usuarios SET nombre=:nombre, correo=:correo, cedula=:cedula, fecha_nacimiento=:fecha_nacimiento, mensaje=:mensaje WHERE id=:id");
    
        // Vincular parámetros de la consulta SQL
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":cedula", $cedula);
        $stmt->bindParam(":fecha_nacimiento", $fecha_nacimiento);
        $stmt->bindParam(":mensaje", $mensaje);
    
        // Ejecutar consulta SQL
        $stmt->execute();
    
        // Retornar el número de filas afectadas por la actualización
        return $stmt->rowCount();
    }
    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
                
}

?>