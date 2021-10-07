<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION['aunt']);

if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-42000);
}

session_destroy();
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
    <title>Velvet - Inscription</title>
  </head>
  <body>
    <div class="container">

      <div class="row">
      <div class="col-lg-4"></div>
        <div class="col-12 col-lg-4 text-center">
        </br></br>
          <form
              class="form-group"
              action="inscription_script.php"
              method="POST"
            >
          <label for="lastname">Lastname :</label>
          <input class="form-control" type="text" name="lastname" value=""></input>
          </br>
          <label for="firstname">Firstname :</label>
          <input class="form-control" type="text" name="firstname" value=""></input>
          </br>
          <label for="username">Mail :</label>
          <input class="form-control" type="text" name="mail" value=""></input>
          </br>
          <label for="password">Password :</label>
          <input class="form-control" type="password" name="password" value=""></input>
          </br>
          </br></br>
          <button class="btn btn-lg btn-success active" type="submit">Connect</button>
          </form>
          </br></br></br>
          <p>
            <?php 
                echo $_SESSION['messageMail'];
                echo $_SESSION['messageLastname'];
                echo $_SESSION['messageFirstname'];
                echo $_SESSION['messagePassword'];  
                echo $_SESSION['message'];
            ?>
          </p>
        </div>
      <div class="col-lg-4"></div>  
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
