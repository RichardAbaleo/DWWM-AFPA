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
    <title>Jarditou - Tableau</title>
  </head>
  <body>
  <?php
    require "connexion_bdd.php";
    $disc_id = $_GET["disc_id"];
    $requete = "SELECT * FROM disc, artist WHERE disc.artist_id = artist.artist_id AND disc_id=".$disc_id;   
    $result = $db->query($requete);
    $row = $result->fetch(PDO::FETCH_OBJ);  
    ?>
    <div class="container">

      <!-- Première ligne -->
      <div class="row">
        <div class="col-12">
          <div class="text-center">
          </br></br>
          <img class="img-fluid" width='400px' src="src/img/<?php echo $row->disc_picture; ?>">
          </div>
          <form
              class="form-group text-center"
              action="delete_script.php?disc_id=<?php echo $disc_id ?>"
              method="POST"
            >
            <fieldset>
            <div class="d-none">
            <br />
              <label for="disc_id">ID :</label>
              <input 
                class="form-control"
                type="text"
                disabled="disabled"
                value="<?php echo $row->disc_id ?>">
              <input
                class="form-control"
                type="hidden"
                name="disc_id"
                value="<?php echo $row->disc_id ?>"
              />
              </br>
              </div>
              </br>
              </br>
              <h2>Êtes vous sûr de vouloir supprimer</h2>
              <h2><b>"<?php echo $row->disc_title; ?>"</b> de la base de données?</h2>
              </br></br>
              <button type="submit" class="btn btn-lg btn-danger active mr-4">Supprimer</button>
              <a type="button" class="btn btn-lg btn-success active ml-4" href="details.php?disc_id=<?php echo $disc_id ?>">Retour</a>                          
            </fieldset>
          </form>
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
