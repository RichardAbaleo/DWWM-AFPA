<?php
class Magasin {

    protected $_nomMagasin;
    protected $_addressMagasin;
    protected $_codePostalMagasin;
    protected $_villeMagasin;

    public function _construct($nom, $address, $codePostal, $ville) 
    {   
        $this->_nomMagasin = $nom;
        $this->_addressMagasin = $address;
        $this->_codePostalMagasin = $codePostal;
        $this->_villeMagasin = $ville;
    }

    public function getMagasin_nom()
    {
        return $this->_nomMagasin;
    }

    public function getMagasin_address()
    {
        return $this->_nomMagasin;
    }

    public function getMagasin_codePostal()
    {
        return $this->_nomMagasin;
    }

    public function getMagasin_ville()
    {
        return $this->_nomMagasin;
    }
}

class Employe extends Magasin {

    private $_nom;
    private $_prenom;
    private $_date;
    private $_poste;
    private $_salary;
    private $_service;

    public function _construct($nom, $prenom, $date, $poste, $salary, $service) 
    {   
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_date = $date;
        $this->_poste = $poste;
        $this->_salary = $salary;
        $this->_service = $service;
    }

    public function Employe_time() 
    {
        $firstDate  = new DateTime($this->_date);
        $secondDate = new DateTime(date("Y-m-d"));
        $interval = $firstDate->diff($secondDate);
        return $interval->format('%Y%');
    }

    public function Employe_prime()
    {
        $prime = (($this->_salary) * 12 * 0.05) + (($this->_salary)* 12 * 0.02 * ($this->Employe_time()));
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