<?php

class Exportar
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function obtenerDatos()
    {
        $id = $_SESSION['user_id'];
        $sql = 'SELECT * FROM eventos';
        $this->db->query($sql);
        // $this->db->bind(':id_usuario', $id);
        
        return $results = $this->db->resultSet();
    }
}