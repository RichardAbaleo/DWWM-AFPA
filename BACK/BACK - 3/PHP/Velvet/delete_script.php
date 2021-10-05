<?php

$disc_id = $_POST["disc_id"]; 
require "connexion_bdd.php";


try {

    $requete = $db->prepare("DELETE from disc WHERE disc_id=:disc_id");

    $requete->bindValue(':disc_id', $disc_id, PDO::PARAM_INT);
    
    $requete->execute();
    
    $requete->closeCursor();
    
}
catch (Exception $e) {
    echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

header("Location: index.php");
exit;

?>