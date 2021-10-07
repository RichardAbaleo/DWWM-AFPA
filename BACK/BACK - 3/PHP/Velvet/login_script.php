<?php
session_start();
 $_SESSION['login'] = htmlspecialchars($_POST['username']);
 $mail = htmlspecialchars($_POST['username']);
 $password = htmlspecialchars($_POST['password']);

 try 
 {
     require "connexion_bdd.php";
     $reqPass = $db->query("SELECT password FROM user WHERE mail='$mail'") or die(print_r($db->erroInfo()));
     $row = $reqPass->fetch(PDO::FETCH_OBJ);
         if (password_verify($password,$row->password)) {
             $_SESSION['aunt'] = "ok";
             unset($_SESSION['message']);
             header("Location: login_test.php");      
         } else {
             unset($_SESSION['aunt']);
             $_SESSION['message'] = "Identifiants incorrects.";
             echo $row->password;
         }
     
 }  
 
 catch (Exception $e) 
 {
     echo 'Erreur : ' . $e->getMessage() . '<br />';
     echo 'N° : ' . $e->getCode();
     die('Fin du script');
 } 
?>