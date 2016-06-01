<?php
session_start();
require_once("../modele/connect.php");

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/accueilv2.css" />
        <link rel="stylesheet" href="../style/admin1.css" />
        <title>Sportymates</title>
        <link rel="icon" type="image/ico" href=logo3.png />
    </head>

    <body>
      <div id='wrapper'>
        <header style="background-image:url(../images/friends.jpg)">
          <?php
          if(empty($_SESSION['pseudo'])){
            include("banniere_entete.php");
            include("nav.php");
          }else{
            include("banniere_entete2.php");
            include("nav.php");
          }
          ?>
        </header>

          <section id="recherche">
            <h1 id="question">Bienvenue dans la partie administrateur</h1>
          </section>

          <section id="bloc-rubrique">

              <div class="ligne">

                  <a href="admin2.php" class="rubrique">
                      <h2>Utilisateurs</h2>
                      <p>Vous trouverez ici la liste détaillée des membres du site ainsi que leurs données personnelles.</p>
                  </a>

                  <a href="admin3.php" class="rubrique">
                      <h2>Groupe</h2>
                      <p>Vous obtiendrez ici la liste des groupes détaillées.</p>
                  </a>

                  <a href="admin4.php" class="rubrique">
                      <h2>Clubs</h2>
                      <p>Vous obtiendrez ici la liste des clubs détaillées.</p>
                  </a>

              </div>

              <div class="ligne">

                <a href="planning.php" class="rubrique">
                    <h2>Planning</h2>
                    <p>Vous trouverez ici le planning avec tous les évènements du site.</p>
                </a>

                  <a href="admin.php" class="rubrique">
                      <h2>Forum</h2>
                      <p>Vous trouverez ici la possibilité de modérer les commentaires et les messages du forum.</p>
                  </a>

                  <a href="admin5.php" class="rubrique">
                      <h2>Aide</h2>
                      <p>Vous pourrez ici administrer la rubrique d’aide en ligne.</p>
                  </a>

              </div>
          </section>

          <?php
          include('bas.php');
          ?>
      </div>
  </body>
</html>
