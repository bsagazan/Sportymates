<?php
session_start();
require_once("../modele/connect.php");

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/accueilv2.css" />
        <link rel="stylesheet" href="../style/admin5.css" />
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
        <a  href="../vue/creerRubriques.php"><input type="button" class="bouton" name="supprimer" value="Ajouter"></a>
     </form>
  </section>

  <br/>
<div id="affichage">
  <table>
    <tr id="attribut">
      <td> idRubrique </td>
      <td> Réponse </td>
      <td> Question </td>
      <td> Catégorie </td>
      <td> </td>
    </tr>
    <?php
    $reponse = $bdd->query('SELECT * FROM rubrique');

      while ($donnees = $reponse->fetch())
      {
    ?>
    <tr>
      <td> <?php echo $donnees['idRubrique']; ?></td>
      <td> <?php echo $donnees['reponse']; ?></td>
      <td> <?php echo $donnees['question']; ?></td>
      <td> <?php echo $donnees['categorie']; ?></td>
      <td><a  href="../controleur/suprubriques.php?rubrique=<?php echo $donnees['idRubrique'] ?>"><input type="button" class="bouton" name="supprimer" value="Supprimer"></a></td>
      <td><a  href="modifier4.php?rubrique=<?php echo $donnees['idRubrique'] ?>"><input type="button" class="bouton" name="modifier" value="Modifier"></a></td>
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
