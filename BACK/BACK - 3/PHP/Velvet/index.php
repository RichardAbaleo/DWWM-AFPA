<?php
 session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- CSS pour bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title>Velvet Record - Index</title>
  </head>
  <body>
    <div class="container-lg">

      <!-- Première ligne -->
      <div class="row">
        <div class="col-12">
          <p class='table-active'><h1><b>Liste des disques (<?php 
                  require "connexion_bdd.php";
                  $reponsetris = $db->query('SELECT disc_id FROM  disc');
                  $totaldisc = 0;
                  while ($donneestris = $reponsetris->fetch()) {
                    $totaldisc =+ $totaldisc + 1;
                  }
                  echo $totaldisc;
                ?>)
          </b></h1></p>
        </div>
      </div>

      <!-- Deuxième ligne -->
      <div class="row">
        <div id="menu" class="col-12">
          <table>
              <?php 
                $double = 0;
                require "connexion_bdd.php";
                $reponsebis = $db->query('SELECT * FROM disc, artist WHERE disc.artist_id = artist.artist_id');
                while ($donnees = $reponsebis->fetch()) {
                  if (($double % 2) == 0){
                    echo "<tr>";
                  }
                  $affichage = "<div>"."<td><img src='src/img/".$donnees['disc_picture'].
                  "' class='img-fluid' width='200px' />"."</td>".
                  "<td class='text-center'><b>".$donnees['disc_title']."</b></br><b>".
                  $donnees['artist_name']."</b></br>".
                  "<b>Label : </b>".$donnees['disc_label']."</br>".
                  "<b>Year : </b>".$donnees['disc_year']."</br>".
                  "<b>Genre : </b>".$donnees['disc_genre']."</br></br>".
                  "<a type='button' class='btn-sm btn-lg btn-info active' href='details.php?disc_id=".$donnees['disc_id']."'>Details</a>".
                  "</td></div>";
                  echo $affichage;
                  if (($double % 2) != 0){
                    echo "</tr>";
                  }
                  $double++;
                }
              ?>
          </table>
            </br></br>
            <a type='button' class='btn btn-lg btn-info ml-2' href='add_form.php'>Ajouter un disque</a>
            </br></br>
        </div>
      </div>

    <!-- Script pour CSS bootstrap -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
