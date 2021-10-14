<?php

require("classes/Employe.class.php");
$test1 = new Employe();
$test2 = new Employe();
$test3 = new Employe();
$test4 = new Employe();
$test5 = new Employe();
$test1->_construct("Nom","Prénom","2017-01-01","employé", 2400, "restauration");
$test2->_construct("Nom","Prénom","2016-01-01","employé", 2300, "restauration");
$test3->_construct("Nom","Prénom","2018-01-01","employé", 1900, "restauration");
$test4->_construct("Nom","Prénom","2017-01-01","employé", 2500, "restauration");
$test5->_construct("Nom","Prénom","2019-01-01","employé", 2200, "restauration");
echo ($test1->Employe_time())."</br>";
echo ($test1->Employe_prime())."</br>";
echo ($test2->Employe_prime())."</br>";
echo ($test3->Employe_prime())."</br>";
echo ($test4->Employe_prime())."</br>";
echo ($test5->Employe_prime())."</br>";
echo $test1->Employe_transfert();
?>