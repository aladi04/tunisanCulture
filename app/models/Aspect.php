<?php

class Aspect {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

     // Récupérer tous les aspects avec pagination
    public function getAspects($page, $perPage) {
        $start = ($page - 1) * $perPage;
        $this->db->query('SELECT * FROM aspects LIMIT :start, :perPage');
        $this->db->bind(':start', $start, PDO::PARAM_INT);
        $this->db->bind(':perPage', $perPage, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    // Récupérer le nombre total d'aspects
    public function getTotalAspects() {
        $this->db->query('SELECT COUNT(*) AS total FROM aspects');
        // Récupérer la première ligne du résultat, qui contiendra le total dans 'total'
        $result = $this->db->single();
        
        // Retourner la valeur du total
        return $result->total;
    }
    

   // Rechercher les aspects avec pagination
   public function searchAspects($searchTerm, $page, $perPage) {
    $start = ($page - 1) * $perPage;
    $this->db->query('SELECT * FROM aspects WHERE nom_aspect LIKE :searchTerm OR categorie LIKE :searchTerm LIMIT :start, :perPage');
    $this->db->bind(':searchTerm', '%' . $searchTerm . '%');
    $this->db->bind(':start', $start, PDO::PARAM_INT);
    $this->db->bind(':perPage', $perPage, PDO::PARAM_INT);
    return $this->db->resultSet();
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
// Dans AspectModel.php
public function getAllAspects() {
    $this->db->query("SELECT * FROM aspects");
    return $this->db->resultSet();
}



     // Compter le nombre de résultats de la recherche
     public function countSearchResults($searchTerm) {
        $this->db->query('SELECT COUNT(*) AS total FROM aspects WHERE categorie LIKE :searchTerm');
        $this->db->bind(':searchTerm', '%' . $searchTerm . '%');
        
        // Récupérer la première ligne du résultat, qui contiendra le total dans 'total'
        $result = $this->db->single();
        
        // Retourner la valeur du total
        return $result->total;
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