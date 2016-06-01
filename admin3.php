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
      <form name="Recherche" align="center" >
        <input type="search" name="champ" placeholder="Trouvez votre réponse" size="40" maxlength="50" />
        <input type="submit" class="bouton" value="Rechercher" />
        <a  href="../vue/creerGroupe.php"><input type="button" class="bouton" name="supprimer" value="Ajouter"></a>
     </form>
  </section>

  <br/>
<div id="affichage">
  <table>
    <tr id="attribut">
      <td> Groupe </td>
      <td> Leader </td>
      <td> Sport </td>
      <td> idClub </td>
      <td> Création </td>
      <td> Niveau </td>
      <td> Ville </td>
      <td> Nombre Max </td>
      <td> Description </td>
      <td> Lien image </td>
      <td> </td>
    </tr>
    <?php
      $reponse = $bdd->query('SELECT * FROM groupe');

      while ($donnees = $reponse->fetch())
      {
    ?>
    <tr>
      <td> <?php echo $donnees['nomGroupe']; ?></td>
      <td> <?php echo $donnees['leader']; ?></td>
      <td> <?php echo $donnees['nomSport']; ?></td>
      <td> <?php echo $donnees['idClub']; ?></td>
      <td> <?php echo $donnees['creation']; ?></td>
      <td> <?php echo $donnees['niveau']; ?></td>
      <td> <?php echo $donnees['ville']; ?></td>
      <td> <?php echo $donnees['nbreMax']; ?></td>
      <td> <?php echo $donnees['description']; ?></td>
      <td> <?php echo $donnees['imgGroupe']; ?></td>
      <td><a  href="../controleur/suppr-groupe.php?groupe=<?php echo $donnees['nomGroupe'] ?>"><input type="button" class="bouton" name="supprimer" value="Supprimer"></a></td>
      <td><a  href="modifier2.php?groupe=<?php echo $donnees['nomGroupe'] ?>"><input type="button" class="bouton" name="modifier" value="Modifier"></a></td>
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
