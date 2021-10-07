<?php
session_start();
if(!isset($_SESSION['aunt'])) {
    //echo "<img src='bad.jpg'/>";
    header("Location: login_form.php");
} 
else {
    echo "<img src='good.jpg'/>";
    //affichage du php
}
?>