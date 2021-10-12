<?php

require("classes/Personnage.class.php");
$Anis = new Personnage();
$Anis->_construct("Ben","Anis",35,"Homme");
// $Anis->setNom("Ben");
// $Anis->setPrenom("Anis");
// $Anis->setAge(35);
// $Anis->setSexe("Homme");
echo $Anis->getNom()."</br>";
echo $Anis->getPrenom()."</br>";
echo $Anis->getAge()."</br>";
echo $Anis->getSexe()."</br>";

?>