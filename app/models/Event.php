<?php

class Event {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Fetch all events with optional aspect information
    public function getEvents(){
        $this->db->query('SELECT 
                            events.*, 
                            aspects.categorie as aspect_name 
                          FROM events
                          LEFT JOIN aspects 
                          ON events.aspect = aspects.id_aspect
                          ORDER BY events.date DESC');
        $result = $this->db->resultSet();
        return $result;
    }
   
    public function getAllAspects() {
        $this->db->query("SELECT id_aspect, categorie FROM aspects");
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
    

    // Add a new event
    public function addEvent($data) {
        // Vérifiez si l'aspect existe dans la table "aspects"
        $aspect = $this->getAspectById($data['aspect']);
        if ($aspect === false) {
            die('L\'aspect spécifié n\'existe pas dans la base de données.');
        }
    
        // Si l'aspect existe, procédez à l'insertion
        $this->db->query('INSERT INTO events (nom, region, description, image, date, aspect) 
                          VALUES (:nom, :region, :description, :image, :date, :aspect)');
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':region', $data['region']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':aspect', $data['aspect']);
    
        // Exécutez la requête
        return $this->db->execute();
    }
    

    // Fetch a single event by ID
    public function getEventById($id_event){
        $this->db->query('SELECT 
                            events.*, 
                            aspects.categorie as aspect_name 
                          FROM events
                          LEFT JOIN aspects 
                          ON events.aspect = aspects.id_aspect
                          WHERE events.id_event = :id_event');
        $this->db->bind(':id_event', $id_event);
        $row = $this->db->single();
        return $row;
    }

    // Update an event
    public function updateEvent($data){
        $this->db->query('UPDATE events 
                          SET nom = :nom, region = :region, description = :description, image = :image, date = :date, aspect = :aspect 
                          WHERE id_event = :id_event');
        $this->db->bind(':id_event', $data['id_event']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':region', $data['region']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':aspect', $data['aspect']);

        // Execute query
        return $this->db->execute();
    }

    // Delete an event
    public function deleteEvent($id_event){
        $this->db->query('DELETE FROM events WHERE id_event = :id_event');
        $this->db->bind(':id_event', $id_event);
        return $this->db->execute();
    }
}