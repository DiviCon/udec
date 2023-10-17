<?php

class Evento 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data_event)
    {
        $query = 'INSERT INTO eventos (tipo, valor, inicio, fin, valores, actividad, porcentaje, evidencia, responsable, estado, id_usuario, fecha_registro) VALUES (:tipo, :valor, :inicio, :fin, :valores, :actividad, :porcentaje, :evidencia, :responsable, :estado, :id_usuario, :fecha_registro)';
        $this->db->query($query);
        
        $this->db->bind(':tipo', $data_event['tipo']);
        $this->db->bind(':valor', $data_event['valor']);
        $this->db->bind(':inicio', $data_event['inicio']);
        $this->db->bind(':fin', $data_event['fin']);
        $this->db->bind(':valores', $data_event['valores']);
        $this->db->bind(':actividad', $data_event['actividad']);
        $this->db->bind(':porcentaje', $data_event['porcentaje']);
        $this->db->bind(':evidencia', $data_event['evidencia']);
        $this->db->bind(':responsable', $data_event['responsable']);
        $this->db->bind(':estado', $data_event['estado']);
        $this->db->bind(':id_usuario', $data_event['id_usuario']);
        $this->db->bind(':fecha_registro', $data_event['fecha_registro']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data_event, $id_evento)
    {
        $query = 'UPDATE eventos 
            SET tipo = :tipo, 
                valor = :valor, 
                inicio = :inicio, 
                fin = :fin, 
                valores = :valores, 
                actividad = :actividad, 
                porcentaje = :porcentaje, 
                evidencia = :evidencia, 
                responsable = :responsable, 
                estado = :estado, 
                id_usuario = :id_usuario, 
                fecha_actualizacion = :fecha_actualizacion
            WHERE id = :id';

        $this->db->query($query);

        $this->db->bind(':id', $id_evento);
        $this->db->bind(':tipo', $data_event['tipo']);
        $this->db->bind(':valor', $data_event['valor']);
        $this->db->bind(':inicio', $data_event['inicio']);
        $this->db->bind(':fin', $data_event['fin']);
        $this->db->bind(':valores', $data_event['valores']);
        $this->db->bind(':actividad', $data_event['actividad']);
        $this->db->bind(':porcentaje', $data_event['porcentaje']);
        $this->db->bind(':evidencia', $data_event['evidencia']);
        $this->db->bind(':responsable', $data_event['responsable']);
        $this->db->bind(':estado', $data_event['estado']);
        $this->db->bind(':id_usuario', $data_event['id_usuario']);
        $this->db->bind(':fecha_actualizacion', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getAll()
    {
        $query = 'SELECT * FROM eventos';
        $this->db->query($query);
        return $results = $this->db->resultSet();
    }

    public function findEventById($id)
    {
        $query = 'SELECT * FROM eventos WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getEventoById($id_evento)
    {
        $query = 'SELECT * FROM eventos WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id_evento);

        $row = $this->db->single();
        return $row;
    }
}
