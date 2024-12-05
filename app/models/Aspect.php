<?php

class Aspect {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAspects() {
        $this->db->query('SELECT * FROM aspects ORDER BY nom_aspect');
        $result = $this->db->resultSet();

        return $result;
    }

    public function getAllAspects() {
        $this->db->query('SELECT * FROM aspects');
        $result = $this->db->resultSet();
        return $result;
    }
    public function getAspectById($id){
        $this->db->query('SELECT * FROM aspects WHERE id_aspect = :id_aspect');
        $this->db->bind(':id_aspect', $id);
        $row = $this->db->single();
    
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    
    public function addAspect($data) {
        $this->db->query('INSERT INTO aspects (nom_aspect, categorie, description_aspect, image_aspect) VALUES (:nom_aspect, :categorie, :description_aspect, :image_aspect)');
        $this->db->bind(':nom_aspect', $data['nom_aspect']);
        $this->db->bind(':categorie', $data['categorie']);
        $this->db->bind(':description_aspect', $data['description_aspect']);
        $this->db->bind(':image_aspect', $data['image_aspect']);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

    public function updateAspect($data) {
        $this->db->query('UPDATE aspects SET nom_aspect = :nom_aspect, categorie = :categorie, description_aspect = :description_aspect, image_aspect = :image_aspect WHERE id_aspect = :id_aspect');
        $this->db->bind(':id_aspect', $data['id_aspect']);
        $this->db->bind(':nom_aspect', $data['nom_aspect']);
        $this->db->bind(':categorie', $data['categorie']);
        $this->db->bind(':description_aspect', $data['description_aspect']);
        $this->db->bind(':image_aspect', $data['image_aspect']);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAspect($id) {
        $this->db->query('DELETE FROM aspects WHERE id_aspect = :id_aspect');
        $this->db->bind(':id_aspect', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}