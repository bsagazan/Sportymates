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
        <link rel="icon" type="image/ico" href=../images/logo3.png />
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
      <td> Pseudo </td>
      <td> Adresse mail </td>
      <td> Nom </td>
      <td> Prénom </td>
      <td> Pays </td>
      <td> Code postal </td>
      <td> Photo </td>
      <td> Sexe </td>
      <td> Date de naissance </td>
      <td> Téléphone </td>
      <td> Statue </td>
      <td> Confirmation </td>
      <td> Black List </td>
      <td> </td>
    </tr>
    <?php
      $reponse = $bdd->query('SELECT * FROM membres');

      while ($donnees = $reponse->fetch())
      {
    ?>
    <tr>
      <td> <?php echo $donnees['id']; ?></td>
      <td> <?php echo $donnees['pseudo']; ?></td>
      <td> <?php echo $donnees['mail']; ?></td>
      <td> <?php echo $donnees['nom']; ?></td>
      <td> <?php echo $donnees['prenom']; ?></td>
      <td> <?php echo $donnees['pays']; ?></td>
      <td> <?php echo $donnees['codepostal']; ?></td>
      <td> <?php echo $donnees['photodeprofil']; ?></td>
      <td> <?php echo $donnees['Sexe']; ?></td>
      <td> <?php echo $donnees['datenaissance']; ?></td>
      <td> <?php echo $donnees['numtel']; ?></td>
      <td> <?php echo $donnees['level']; ?></td>
      <td> <?php echo $donnees['confirme']; ?></td>
      <td> <?php echo $donnees['blackList']; ?></td>
      <td><a href="../controleur/admin-utilisateur.php?id=<?php echo $donnees['id'] ?>"><input type="button" class ="bouton"name="supprimer" value="Supprimer"></a></td>
      <td><a href="../controleur/bannir.php?id=<?php echo $donnees['id'] ?>"><input type="button" class ="bouton" name="bannir" value="Bannir"></a></td>
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
