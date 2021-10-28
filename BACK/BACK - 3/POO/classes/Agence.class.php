<?php

class Agence {

protected $_agence;
protected $_addressMagasin;
protected $_codePostalMagasin;
protected $_villeMagasin;

public function _construct($nom, $address, $codePostal, $ville) 
{   
    $this->_agence = $nom;
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
?>