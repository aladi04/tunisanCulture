<?php

class ModelReponse
{
    private $id_reponse;
    private $message;
    private $date_rep;
    private $id_reclamation; // Clé étrangère vers la table "reclamation"


    protected static $table = 'reponse';

    // Constructor
    public function __construct($id_reponse = NULL, $message = NULL, $date_rep = NULL, $id_reclamation = NULL)
    {
        if (!is_null($message) && !is_null($date_rep) && !is_null($id_reclamation)) {
            $this->message = $message;
            $this->date_rep = $date_rep;
            $this->id_reclamation = $id_reclamation;
        }
    }

    // Getters
    public function getIdReponse()
    {
        return $this->id_reponse;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getDateRep()
    {
        return $this->date_rep;
    }

    public function getIdReclamation()
    {
        return $this->id_reclamation;
    }

    // Setters
    public function setIdReponse($id_reponse)
    {
        $this->id_reponse = $id_reponse;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setDateRep($date_rep)
    {
        $this->date_rep = $date_rep;
    }

    public function setIdReclamation($id_reclamation)
    {
        $this->id_reclamation = $id_reclamation;
    }
}
