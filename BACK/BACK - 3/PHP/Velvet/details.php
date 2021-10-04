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
    <title>Jarditou - Details</title>
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
        </br></br>
          <div class="text-center">
          <img class="img-fluid" width='400px' src="src/img/<?php echo $row->disc_picture; ?>">
          </div>
          <form>
            <fieldset>
            <br />
              <label for="disc_title">Title :</label>
              <input
                class="form-control"
                type="text"
                name="title"
                required
                disabled="disabled"
                value="<?php echo $row->disc_title ?>"
              />
              <br />
              <label for="artist_name">Artist :</label>
              <input
                class="form-control"
                type="text"
                name="artist"
                required
                disabled="disabled"
                value="<?php echo $row->artist_name ?>"
              />
              <br />
              <label for="disc_label">Label :</label>
              <input
                class="form-control"
                type="text"
                name="label"
                required
                disabled="disabled"
                value="<?php echo $row->disc_label ?>"
              />
              </br>
              <label for="disc_year">Year :</label>
              <input
                class="form-control"
                type="text"
                name="year"
                required
                disabled="disabled"
                value="<?php echo $row->disc_year ?>"
              />
              </br>
              <label for="disc_genre">Genre :</label>
              <input
                class="form-control"
                type="text"
                name="genre"
                required
                disabled="disabled"
                value="<?php echo $row->disc_genre ?>"
              />
              </br>
              <label for="disc_price">Price :</label>
              <input
                class="form-control"
                type="text"
                name="price"
                required
                disabled="disabled"
                value="<?php echo $row->disc_price ?>"
              />
              </br>
              </br>
              <a type="button" class="btn btn-lg btn-secondary active" href="index.php">Retour</a>
              <a type="button" class="btn btn-lg btn-warning ml-4 active" href="update_form.php?disc_id=<?php echo $disc_id ?>">Modifier</a>
              <a type="button" class="btn btn-lg btn-danger ml-4 active" href="delete_form.php?disc_id=<?php echo $disc_id ?>">Supprimer</a>
              </br>
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
