<?php

class Event {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Fetch paginated events with optional aspect information
    public function getEvents($page = 1, $limit = 5) {
        // Calculate the offset for the pagination
        $offset = ($page - 1) * $limit;
        
        // Query for events with pagination
        $this->db->query('SELECT 
                            events.*, 
                            aspects.categorie as aspect_name 
                          FROM events
                          LEFT JOIN aspects 
                          ON events.aspect = aspects.id_aspect
                          ORDER BY events.date DESC
                          LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        $result = $this->db->resultSet();
        return $result;
    }

    // Count the total number of events for pagination calculation
    public function getEventCount() {
        $this->db->query('SELECT COUNT(id_event) as total FROM events');
        $result = $this->db->single();
        return $result->total;
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

    public function addEvent($data) {
        $aspect = $this->getAspectById($data['aspect']);
        if ($aspect === false) {
            die('L\'aspect spécifié n\'existe pas dans la base de données.');
        }
    
        $this->db->query('INSERT INTO events (nom, region, description, image, date, aspect) 
                          VALUES (:nom, :region, :description, :image, :date, :aspect)');
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':region', $data['region']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']); // Image path
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':aspect', $data['aspect']);
    
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
        return $this->db->execute();
    }

    // Delete an event
    public function deleteEvent($id_event){
        $this->db->query('DELETE FROM events WHERE id_event = :id_event');
        $this->db->bind(':id_event', $id_event);
        return $this->db->execute();
    }

    // Search events by name or description
    public function searchEvents($search_term, $page, $limit) {
        $start = ($page - 1) * $limit;
    
        $this->db->query('SELECT * FROM events WHERE nom LIKE :search_term OR description LIKE :search_term LIMIT :start, :limit');
        $this->db->bind(':search_term', '%' . $search_term . '%');
        $this->db->bind(':start', $start, PDO::PARAM_INT);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        
        return $this->db->resultSet();
    }
    
    public function countSearchResults($search_term) {
        $this->db->query('SELECT COUNT(*) as total FROM events WHERE nom LIKE :search_term OR description LIKE :search_term');
        $this->db->bind(':search_term', '%' . $search_term . '%');
        $result = $this->db->single();
        return $result->total;
    }
    
}
