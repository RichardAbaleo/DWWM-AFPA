<?php
session_start();
$password_post = htmlspecialchars($_POST['password']);
$_SESSION['login'] = htmlspecialchars($_POST['mail']);
$mail = htmlspecialchars($_POST['mail']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$password = password_hash($password_post, PASSWORD_DEFAULT);
function complex_password($password_post){
    $uppercase = preg_match('@[A-Z]@', $password_post);
    $lowercase = preg_match('@[a-z]@', $password_post);
    $number = preg_match('@[0-9]@', $password_post);
    if(!$uppercase || !$lowercase || !$number || strlen($password_post) < 8) {
      return false;
    } else {
      return true;
    }
}

try 

{
    $check = 0;
    if(!preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i", $mail)){
        $_SESSION['messageMail'] = "Email unvalid </br>";
        $check = 1;
    }
    if($lastname == ""){
        $_SESSION['messageLastname'] = "Lastname empty </br>";
        $check = 1;
    }
    if($firstname == ""){
        $_SESSION['messageFirstname'] = "Firstname empty </br>";
        $check = 1;
    }
    if(!complex_password($password_post)){
        $_SESSION['messagePassword'] = "Password incorrect (1 MAJ, 1 min, 1 number, 8 length at least) </br>";
        $check = 1;
    }
    if($check == 1){
        header("Location: inscription_form.php");
    }
    else {
    unset($_SESSION['messageMail']);
    unset($_SESSION['messageLastname']);
    unset($_SESSION['messageFirstname']);
    unset($_SESSION['messagePassword']); 
    require "connexion_bdd.php";
    $req = $db->query("SELECT mail FROM user WHERE mail='$mail'") or die(print_r($db->erroInfo()));
    $data = $req->fetch();
    
        if ($data){
            $_SESSION['aunt'] = NULL;
            $_SESSION['message'] = "Pseudonyme déjà utilisé.";
            header("Location: inscription_form.php");
        } else {
            $rq = "INSERT INTO user(lastname, firstname, mail, password)
            VALUES (:lastname,:firstname,:mail,:password)";
            $requete = $db->prepare($rq);
            $requete->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $requete->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
            $requete->bindValue(':password', $password, PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
            $_SESSION['aunt'] = "ok";
            unset($_SESSION['message']);
            header("Location: login_test.php");
        }
    }

}
catch (Exception $e) {
    echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

?>

