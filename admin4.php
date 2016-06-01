<?php
session_start();
require_once("../modele/connect.php");

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/accueilv2.css" />
        <link rel="stylesheet" href="../style/admin2.css" />
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
    <br/>
    <div id="retour">
    <a href="admin1.php">
        <img src="../images/fleche_retour.png" alt="retour_aide"/>
    </a>
     <h2 id="question">Recherche avancée</h2>
     <a href="../vue/accueilv2.php" ><img src="../images/iconeHome.png" alt="accueilSite"/></a>
   </div>
      <form name="Recherche" >
        <input type="search" name="champ" placeholder="Trouvez votre réponse" size="40" maxlength="50" />
        <input type="submit" class="bouton" value="Rechercher" />
     </form>
  </section>

  <br/>
<div id="affichage">
  <table>
    <tr id="attribut">
      <td> id </td>
      <td> Nom </td>
      <td> Adresse </td>
      <td> Téléphone </td>
      <td> Heure Ouverture </td>
      <td> Heure Fermeture  </td>
      <td> Jour Ouverture </td>
      <td> Jour Fermeture </td>
      <td> Description </td>
      <td> </td>
    </tr>
    <?php
    $reponse = $bdd->query('SELECT * FROM club');

      while ($donnees = $reponse->fetch())
      {
    ?>
    <tr>
      <td> <?php echo $donnees['idClub']; ?></td>
      <td> <?php echo $donnees['nomClub']; ?></td>
      <td> <?php echo $donnees['adresse']; ?></td>
      <td> <?php echo $donnees['telephone']; ?></td>
      <td> <?php echo $donnees['heureOuverture']; ?></td>
      <td> <?php echo $donnees['heureFermeture']; ?></td>
      <td> <?php echo $donnees['jourOuverture']; ?></td>
      <td> <?php echo $donnees['jourFermeture']; ?></td>
      <td> <?php echo $donnees['description']; ?></td>
      <td><a  href="../controleur/suppr-club.php?club=<?php echo $donnees['idClub'] ?>"><input type="button" name="supprimer" class="bouton" value="Supprimer"></a></td>
      <td><a  href="modifier3.php?club=<?php echo $donnees['idClub'] ?>"><input type="button" name="modifier" class="bouton" value="Modifier"></a></td>
    </tr>

    <?php

      }
      $reponse->closeCursor();

    ?>
    </div>
    <br/>

    </div>

    </body>
</html>
