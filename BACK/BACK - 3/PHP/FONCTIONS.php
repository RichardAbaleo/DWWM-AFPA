<?php
        function lien($url,$title) {
          echo "<a href=" . $url . ">" . $title . "</a>";
        }
        lien("https://www.reddit.com/", "Reddit Hug");
?>

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