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
    <title>Jarditou - Modification</title>
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
        <span style="color:red;">
        <?php echo @$_SESSION['erreur_verif'] ?>
        </span>
        <br /><br />
          <div class="text-center">
          <img class="img-fluid" width='400px' src="src/img/<?php echo $row->disc_picture; ?>">
          </div>
          <form
              id="updateForm"
              class="form-group"
              action="update_script.php?disc_id=<?php echo $disc_id ?>"
              method="POST"
              onsubmit="return updateVerif();"
            >
            <fieldset>
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
             <br />
              <label for="disc_title">Title :</label>
              <input
                class="form-control"
                type="text"
                id="title"
                name="disc_title"
                value="<?php echo $row->disc_title ?>"
              />
             <span id="titleErreur" style="color:red;"></span>
                <br />
              <label for="artist_id">Artist :</label>
              <select class="form-control" id="artist_id" name="artist_id">
              <?php
              
              while ($donnees = $reponse->fetch()) {
              ?>
              <option value="<?php echo $donnees['artist_id']; ?>"><?php echo $donnees['artist_name']; ?></option>
              <?php
              }
              ?>
              </select>
              <span id="artistErreur" style="color:red;"></span>
              <br />
              <label for="disc_label">Label :</label>
              <input
                class="form-control"
                type="text"
                name="disc_label"
                id="label"
                value="<?php echo $row->disc_label ?>"
              />
              <span id="labelErreur" style="color:red;"></span>
              <br />
              <label for="year">Year :</label>
              <input
                class="form-control"
                type="text"
                name="disc_year"
                id="year"
                value="<?php echo $row->disc_year ?>"
              />
              <span id="yearErreur" style="color:red;"></span>
              <br />
              <label for="disc_genre">Genre :</label>
              <input
                class="form-control"
                type="text"
                name="disc_genre"
                id="genre"
                value="<?php echo $row->disc_genre ?>"
              />
              <span id="genreErreur" style="color:red;"></span>
              <br />
              <label for="disc_price">Price :</label>
              <input
                class="form-control"
                type="text"
                name="disc_price"
                id="price"
                value="<?php echo $row->disc_price ?>"
              />
              <span id="priceErreur" style="color:red;"></span>
              <br />
              <br />
            </fieldset>
            <a type="button" class="btn btn-lg btn-secondary active" href="details.php?disc_id=<?php echo $disc_id ?>">Retour</a>
            <button type="submit" id="enregistrer" class="btn btn-lg btn-success ml-5 active">Enregister</button>
            <br />
          </form>
          <br />
        </div>
      </div>

      <!-- Cinquième ligne-->
      <footer>
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand bg-dark navbar-dark">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="">Mention légales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Horaires</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Plan du site</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
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
    <script src="assets/js/form_verif.js"></script>
  </body>
</html>
