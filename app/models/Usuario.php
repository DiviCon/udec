<?php

class Usuario 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login($login, $password)
    {
        $query = 'SELECT * FROM usuarios WHERE email_usuario = :email';
        $this->db->query($query);
        $this->db->bind(':email', $login);

        $row = $this->db->single();

        if ($row) {
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function saveUser($dataForm)
    {
        $query = 'INSERT INTO usuarios (
            nombre_usuario,
            apellidos_usuario,
            email_usuario, 
            password_usuario) 
            VALUES (
                :nombre_usuario,
                :apellidos_usuario, 
                :email_usuario, 
                :password_usuario)';
        $this->db->query($query);
        
        $this->db->bind(':nombre_usuario', $dataForm['inputNombre']);
        $this->db->bind(':apellidos_usuario', $dataForm['inputApellidos']);
        $this->db->bind(':email_usuario', $dataForm['inputEmail']);
        $this->db->bind(':password_usuario', password_hash($dataForm['inputPassword'], PASSWORD_DEFAULT));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $query = 'SELECT * FROM usuarios WHERE email_usuario = :email';
        $this->db->query($query);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
