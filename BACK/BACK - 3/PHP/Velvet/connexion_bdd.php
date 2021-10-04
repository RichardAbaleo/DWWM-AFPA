<?php

try 
{
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "root", "a"); 

    $reponse = $db->query('SELECT DISTINCT artist.artist_id, artist_name FROM artist' );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} 

catch (Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}


?>