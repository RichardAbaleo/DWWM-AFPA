EXO - 1 

<?php
        $annee = array(
          "Janvier" => 31,
          "Février" => 28,
          "Mars" => 31,
          "Avril" => 30,
          "Mai" => 31,
          "Juin" => 30,
          "Juillet" => 31,
          "Aout" => 31,
          "Septembre" => 30,
          "Octobre" => 31,
          "Novembre" => 30,
          "Décembre" => 31
        );
        foreach($annee as $mois => $valeur){
          echo "Nombre de jours en $mois : $valeur jours<br/>";
        }
        arsort($annee);
        foreach($annee as $mois => $valeur){
          echo $mois ." : $valeur jours<br/>";
        }
?>    


EXO - 2

<?php
        $capitales = array(
          "Bucarest" => "Roumanie",
          "Bruxelles" => "Belgique",
          "Oslo" => "Norvège",
          "Ottawa" => "Canada",
          "Paris" => "France",
          "Port-au-Prince" => "Haïti",
          "Port-d'Espagne" => "Trinité-et-Tobago",
          "Prague" => "République tchèque",
          "Rabat" => "Maroc",
          "Riga" => "Lettonie",
          "Rome" => "Italie",
          "San José" => "Costa Rica",
          "Santiago" => "Chili",
          "Sofia" => "Bulgarie",
          "Alger" => "Algérie",
          "Amsterdam" => "Pays-Bas",
          "Andorre-la-Vieille" => "Andorre",
          "Asuncion" => "Paraguay",
          "Athènes" => "Grèce",
          "Bagdad" => "Irak",
          "Bamako" => "Mali",
          "Berlin" => "Allemagne",
          "Bogota" => "Colombie",
          "Brasilia" => "Brésil",
          "Bratislava" => "Slovaquie",
          "Varsovie" => "Pologne",
          "Budapest" => "Hongrie",
          "Le Caire" => "Egypte",
          "Canberra" => "Australie",
          "Caracas" => "Venezuela",
          "Jakarta" => "Indonésie",
          "Kiev" => "Ukraine",
          "Kigali" => "Rwanda",
          "Kingston" => "Jamaïque",
          "Lima" => "Pérou",
          "Londres" => "Royaume-Uni",
          "Madrid" => "Espagne",
          "Malé" => "Maldives",
          "Mexico" => "Mexique",
          "Minsk" => "Biélorussie",
          "Moscou" => "Russie",
          "Nairobi" => "Kenya",
          "New Delhi" => "Inde",
          "Stockholm" => "Suède",
          "Téhéran" => "Iran",
          "Tokyo" => "Japon",
          "Tunis" => "Tunisie",
          "Copenhague" => "Danemark",
          "Dakar" => "Sénégal",
          "Damas" => "Syrie",
          "Dublin" => "Irlande",
          "Erevan" => "Arménie",
          "La Havane" => "Cuba",
          "Helsinki" => "Finlande",
          "Islamabad" => "Pakistan",
          "Vienne" => "Autriche",
          "Vilnius" => "Lituanie",
          "Zagreb" => "Croatie"
        );
        ksort($capitales);
        foreach($capitales as $ville => $pays){
          echo $ville . " => " . "$pays" . "<br/>";
        }
        echo count($capitales) . " pays dans le tableau *capitales*.<br/>";
        foreach($capitales as $ville => $pays){
          
          if((substr($ville, 0, 1)) != B){
            unset($capitales[$ville]);
          }
          else {
            echo $ville . "<br/>";
          }
        }
        foreach($capitales as $ville => $pays){
          echo $ville . " => " . "$pays" . "<br/>";
        }
?>


EXO - 3

<?php
        $departements = array(
          "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
          "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
          "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
          "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
        );

        ksort($departements);
        
        foreach($departements as $région => $dep){
          echo "$région : ";
          for($n = 0 ; $n <= count($departements[$région]) ; $n++){
            echo $departements[$région][$n]." ";
          }
        echo "<br/>";
        }

        foreach($departements as $région => $dep){
          echo "$région : " . count($dep) . " départements. <br/>";
        }
?>