EXO - 1

<?php
        function lien($url,$title) {
          echo "<a href=" . $url . ">" . $title . "</a>";
        }
        lien("https://www.reddit.com/", "Reddit Hug");
?>


EXO - 2

<?php
        function somme($ftab) {
          $somme = 0;
          foreach($ftab as $value){
            $somme += $value;
          }
          return $somme;
        }
        $tab = array(4, 3, 8, 2);
        $resultat = somme($tab);
        echo $resultat;
?>


EXO - 3

<?php
        function complex_password($f_password){
          $uppercase = preg_match('@[A-Z]@', $f_password);
          $lowercase = preg_match('@[a-z]@', $f_password);
          $number = preg_match('@[0-9]@', $f_password);
          if(!$uppercase || !$lowercase || !$number || strlen($f_password) < 8) {
            return false;
          } else {
            return true;
          }
        }
        $resultat = complex_password("TopSecret42");
      ?>