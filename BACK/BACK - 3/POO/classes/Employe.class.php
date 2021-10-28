<?php

require "Agence.class.php";

class Employe {

    public $_nom;
    public $_prenom;
    public $_dateEmbauche;
    public $_fonction;
    public $_salaire;
    public $_service;
    public $_nomMagasin;
    protected $_agence;

    public function _construct($nom, $prenom, $date, $poste, $salaire, $service, $agence) 
    {   
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateEmbauche = $date;
        $this->_fonction = $poste;
        $this->_salaire = $salaire;
        $this->_service = $service;
        $this->_agence = $agence;
    }

    public function Employe_time() 
    {
        $firstDate  = new DateTime($this->_dateEmbauche);
        $secondDate = new DateTime(date("Y-m-d"));
        $interval = $firstDate->diff($secondDate);
        return $interval->format('%Y%');
    }

    public function Employe_prime()
    {
        $prime = (($this->_salaire) * 12 * 0.05) + (($this->_salaire)* 12 * 0.02 * ($this->Employe_time()));
        return $prime; 
    }

    public function Employe_transfert()
    {
        //$date_today = new DateTime("2021-11-30");
        $date_today = new DateTime(date("Y-m-d"));
        $date_transfert = new DateTime("2021-11-30");
        $interval = $date_today->diff($date_transfert);
        if(($interval->days) == 0) {
            return "L'ordre de transfert a été envoyé à la banque. Montant : " . $this->Employe_prime() . "€";
        } else {
            return "L'ordre de transfert sera effectué le 30/11";
        }
    }
}

?>