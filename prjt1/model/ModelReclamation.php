<?php

class ModelReclamation
{
    private $ID_REC;
    private $email;
    private $titre;
    private $statut;
    private $type_reclamation;

    protected static $table = 'reclamation';

    // Constructor
    public function __construct($ID_REC = NULL, $titre = NULL, $email = NULL, $statut = NULL , $type_reclamation = NULL)
    {
        if (!is_null($titre)&& !is_null($email) && !is_null($statut) && !is_null($type_reclamation)) {
            $this->titre = $titre;
            $this->email = $email;
            $this->statut = $statut;
            $this->type_reclamation = $type_reclamation;
        }
    }

    // Getter Methods
    public function getID_REC()
    {
        return $this->ID_REC;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getTypeReclamation()
    {
        return $this->type_reclamation;
    }


    // Setter Methods
    public function setID_REC($ID_REC)
    {
        $this->ID_REC = $ID_REC;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setTypeReclamation($type_reclamation)
    {
        $this->type_reclamation = $type_reclamation;
    }


}
