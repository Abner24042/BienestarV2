<?php
require_once __DIR__ . '/../config/database.php';

class Cita {
    private $db;
    private $table = 'citas_bieniestar';
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    /**
     * Crear nueva cita
     */
    public function create($data) {
        try {
            $query = "INSERT INTO " . $this->table . " 
                     (fecha, hora, titulo, correo) 
                     VALUES (:fecha, :hora, :titulo, :correo)";
            
            $stmt = $this->db->prepare($query);
            
            $stmt->bindParam(':fecha', $data['fecha']);
            $stmt->bindParam(':hora', $data['hora']);
            $stmt->bindParam(':titulo', $data['titulo']);
            $stmt->bindParam(':correo', $data['correo']);
            
            if ($stmt->execute()) {
                return $this->db->lastInsertId();
            }
            
            return false;
        } catch (PDOException $e) {
            error_log('Error en create cita: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Obtener citas por correo
     */
    public function getByEmail($email) {
        try {
            $query = "SELECT * FROM " . $this->table . " 
                     WHERE correo = :email 
                     ORDER BY fecha DESC, hora DESC";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log('Error en getByEmail cita: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Obtener cita por ID
     */
    public function findById($id) {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Error en findById cita: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Actualizar cita
     */
    public function update($id, $data) {
        try {
            $query = "UPDATE " . $this->table . " 
                     SET fecha = :fecha, 
                         hora = :hora,
                         titulo = :titulo
                     WHERE id = :id";
            
            $stmt = $this->db->prepare($query);
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':fecha', $data['fecha']);
            $stmt->bindParam(':hora', $data['hora']);
            $stmt->bindParam(':titulo', $data['titulo']);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Error en update cita: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Eliminar cita
     */
    public function delete($id) {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Error en delete cita: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Obtener todas las citas
     */
    public function getAll() {
        try {
            $query = "SELECT c.*, u.nombre 
                     FROM " . $this->table . " c
                     LEFT JOIN usuarios u ON c.correo = u.correo
                     ORDER BY c.fecha DESC, c.hora DESC";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log('Error en getAll citas: ' . $e->getMessage());
            return [];
        }
    }
}