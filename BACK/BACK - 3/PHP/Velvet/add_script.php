<?php
session_start();
$disc_title = htmlspecialchars($_POST["disc_title"]); 
$artist_id = $_POST["artist_id"];
$disc_label = htmlspecialchars($_POST["disc_label"]);
$disc_year = htmlspecialchars($_POST["disc_year"]);
$disc_genre = htmlspecialchars($_POST["disc_genre"]);
$disc_price = htmlspecialchars($_POST["disc_price"]);
$disc_picture = $_FILES["disc_picture"]["name"];
$tmpName = $_FILES['disc_picture']['tmp_name'];


require "connexion_bdd.php";

try {

$rq = "INSERT INTO disc(artist_id,disc_title,disc_label,disc_year,disc_genre,disc_price,disc_picture)
 VALUES (:artist_id,:disc_title,:disc_label,:disc_year,:disc_genre,:disc_price,:disc_picture)";
$requete = $db->prepare($rq);
$requete->bindValue(':disc_title', $disc_title, PDO::PARAM_STR);
$requete->bindValue(':artist_id', $artist_id, PDO::PARAM_INT);
$requete->bindValue(':disc_label', $disc_label, PDO::PARAM_STR);
$requete->bindValue(':disc_year', $disc_year, PDO::PARAM_INT);
$requete->bindValue(':disc_genre', $disc_genre, PDO::PARAM_STR);
$requete->bindValue(':disc_price', $disc_price, PDO::PARAM_INT);
$requete->bindValue(':disc_picture', $disc_picture, PDO::PARAM_STR);
move_uploaded_file($tmpName, 'src/img/'.$disc_picture);


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