<?php
      date_default_timezone_set("Europe/Paris");
      $date = new DateTime("07/14/2019");
      echo $date->format("d/m/Y W ");
      echo (($date->format("W"))+1)." => prochaine semaine";
?>



<?php
      $firstDate  = new DateTime("04/05/2022");
      $nowDate = date("m/d/Y");
      $secondDate = new DateTime($nowDate);
      $interval = $firstDate->diff($secondDate);
      echo $interval->days . " jours avant la fin de la formation.";
?>


<?php
      $firstDate  = new DateTime("01/01/2020");
      $secondDate = new DateTime("01/01/2021");
      $interval = $firstDate->diff($secondDate);
      echo $interval->days . " jours";
      // Si l'année comporte 366 jours au lieu de 365, elle est bissextile.
?>




<?php
      $date =  DateTime::createFromFormat("d/m/Y", "32/17/2019");
      $errors = DateTime::getLastErrors();     
      if ($errors["error_count"]>0 || $errors["warning_count"]>0) {
          echo "Date érronée.";
      }
?>



<?php
      $date = new DateTime((date("d/m/y H:i")));
      echo $date->format("H\hi");
?>




<?php
      $date = new DateTime((date("m/d/y")));
      echo $date->format("d/") . ($date->format("m")+1) . $date->format("/y");
?>


<?php
        echo date("d/m/y", 1000200000);
        //C'est pas très Charlie cette date si j'ose dire.
?>