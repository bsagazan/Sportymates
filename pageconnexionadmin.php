<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://localhost/Sportymates1/style/pageconnexionadmin.css" />
        <link rel="stylesheet" href="http://localhost/Sportymates1/style/accueil2.css" />
        <title>Sportymates-Formulaireinscription</title>
        <link rel="icon" type="image/ico" href=logo3.png />
    </head>

    <body>
      <div id='wrapper'>
        <header style="background-image:url(../images/ban2.jpg)">
            <?php
            include("banniere_entete.php");
            include("nav.php");
            ?>
        </header>
  <div id="partiecontacte" style="background-image:url(../images/connexion.jpg)">
                <h2>Connexion au site de Sportymates </h2>
                  <div id="partie2">
                    <form action="http://localhost/Sportymates1/controleur/connexion2.php" method="post">
                    <label for="name" class="name1">Adresse mail <input type="text"  maxlength="30" class="name" name="mailconnect" required /></label></br></br>
                    <label for="mdp" class="mdp1">Mot de Passe <input class="mdp" type="password"  maxlength="20" name="mdpconnect" required/></label></br>

        <div id="all">
            <div class="perdu">
            <a href="recuperationmdp1.php">Nom d'utilisateur ou mot de passe perdu?</a></br>
            </div>
            <div class="accueil">
            <a href="http://localhost/Sportymates1/vue/accueilv2.php">Retour à la page d'accueil du site</a>
        </div>
      </div>
    <button class="connexion" name="connexion" value="connexion"><strong>Connexion</strong></button>

                  </form>
                  <?php
                  if(isset($erreur)) {
                     echo '<font color="red">'.$erreur."</font>";
                  }
                  ?>
            </div>
          </div>
          <?php
          include('bas.php');
          ?>
        </div>
    </body>
</html>
