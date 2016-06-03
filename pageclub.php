<?php
session_start();
require_once("../modele/connect.php");
?>
<?php
    //var_dump($_GET["identifiant"]);
  $idClub = $_GET["identifiant"];
	$reponse = $bdd->query("SELECT * FROM club WHERE nomClub = '$idClub'");
	$donnees = $reponse->fetch();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../style/style_profilClub.css"/>
        <link rel="stylesheet" href="../style/accueilv2.css" />
        <title><?php echo $donnees["nomClub"]; ?> - Clubs Sportymates </title>
        <link rel='icon' type="image/ico" href="../images/Logo1.png"/>
    </head>
    <body>
        <div id="bloc_page">
          <header style="background-image:url(../images/Friends.jpg)">
            <?php
            if(empty($_SESSION['pseudo'])){
              include("banniere_entete.php");
            }else{
              include("banniere_entete2.php");
            }
            ?>
            <div id="Titre">
              <h1><?php echo $donnees["nomClub"]; ?></h1><br>
            </div>

                <?php include("nav.php");?>

            </header>

            <div id="bloc_centre">
                <section id="gauche">
                    <div id="description">
                        <h1>Description</h1>
                        <p><?php echo $donnees["description"]; ?></p>
                    </div>

                    <div id="localisation">
                        <h1>Localisation</h1>
                        <div id="carte">
                            <div id="adresse">
                                <h2>Adresse</h2>
                                <p><?php echo $donnees["adresse"]; ?></p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d51191.25454448657!2d2.3498680877572555!3d48.85503787947096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1459758273583" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div id="photos">
                        <h1>Photos</h1>
                        <div id="album">
                            <img src="../images/ForestHill_Aquaboulevard3.jpg" alt="forest5"/>
                            <img src="../images/forest1.jpg" alt="forest1"/>
                            <img src="../images/forest2.jpg" alt="forest2"/>
                            <img src="../images/forest4.jpg" alt="forest4"/>
                            <img src="../images/forest3.jpg" alt="forest3"/>
                            <img src="../images/ForestHill_Aquaboulevard1.jpg" alt="forest"/>
                        </div>

                    </div>

                    <div id="commentaires">
                      <h1>Commentaires</h1>

                       <?php

                  $reponse2 = $bdd->query("SELECT * FROM commentaire WHERE nomClub = '$idClub' ORDER BY dateHeure DESC");
                  while ($donnees2 = $reponse2->fetch()) {
                  ?>

                      <dl class = comCom>
                        <dt class = auteurCom> <?php echo $donnees2["auteur"] ?> <p class = heureCom><?php echo $donnees2["dateHeure"]; ?></p></dt>
                        <dd class = contenuCom> <?php echo $donnees2["contenu"] ?> </dd>
                      </dl>
                      <br>
                      <?php
                    	}
                    	$reponse2->closeCursor();
                        ?>
                        </div>
                        <?php if(isset($_SESSION['pseudo'])){
                        ?>
                        <div id = "commenter">

                            <h1>Commenter</h1>

                            <form method="post" action="cibleCom1.php">
                                <input type="hidden" name="auteur" value="<?php echo $_SESSION["pseudo"]; ?>">
                                <input type="hidden" name="club" value="<?php echo $idClub; ?>">
                                <textarea type="message" rows="10" cols ="70" name="contenuCom">Tapez votre commentaire ici. </textarea>
                                <br>
                                <input type="submit" class = "bouton" value="Commenter">
                            </form>

                        </div>
                        <?php
                            }
                        ?>
                     </section>

                <section id="droite">

                  <div id="profilClub">
                      <figcaption><?php echo $donnees["nomClub"]; ?></figcaption>
                      <img alt="<?php echo $donnees["nomClub"]; ?>" src="Clubs/img-Clubs/<?php echo $donnees["imgClub"];?>" height="80" width="150"/>
                      <?php if (isset($_SESSION['pseudo'])) {?>
                        <td><a  href="modifier33.php?club=<?php echo $donnees['idClub'] ?>"><input type="button" name="modifier" class="bouton" value="Modifier"></a></td>
                      <a  href="../controleur/suppr-club.php?club=<?php echo $donnees['idClub'] ?>"><input type="button" class="bouton" name="supprimer" value="Supprimer"></a>
                   <?php  }?>
                  </div>

                  <?php if (!isset($_SESSION['pseudo'])) {?>
                    <br/>
                    <p align="center">Connectez-vous pour commenter ou noter le club.</p>
                    <br/>
                    <?php
                    }
                    ?>

                    <div id="informations">

                        <h1>Horaires</h1>
                        <p>
                            Ouvert du
                            <?php echo $donnees["jourOuverture"]; ?>
                            au
                            <?php echo $donnees["jourFermeture"]; ?>
                            <br/> de
                            <?php echo $donnees["heureOuverture"]; ?>
                            à
                            <?php echo $donnees["heureFermeture"]; ?>
                        </p>

                        <h1>Nous contacter</h1>
                        <p>Numero de téléphone :<?php echo $donnees["telephone"]; ?>
</p>
                    </div>

                    <?php
                    $reponse4 = $bdd->query("SELECT * FROM noterclub WHERE idClub = '$idClub'");
                    $note = 0;
                    $diviseur = 0;
                    while ($donnees4 = $reponse4->fetch()){
                        $note = $note + $donnees4["note"];
                        $diviseur = $diviseur + 1;
                    }

                    if ($diviseur == 0){
                        $diviseur = 1;
                    }

                    $noteF = $note / $diviseur;
                    ?>

                    <div id="note">
                    <h1>Note du club</h1>

                    <p class = noteFinale> <?php echo $noteF; ?> / 5</p>
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                    <form method="post" action="cibleNote2.php">
                        <input type="hidden" name="auteur" value="<?php echo $_SESSION["pseudo"]; ?>">
                        <input type="hidden" name="idClub" value="<?php echo $idClub; ?>">
                        <select name="note">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <br>
                        <input type="submit" class = "bouton" value="Noter">
                    </form>
                    <?php
                    }
                    ?>
                    </div>

                    <div id="Reseaux">
                        <h1>Rejoignez-nous sur les réseaux sociaux !</h1>
                        <div id="icon">
                            <a href=# ><img src="../images/logo_facebook.png" alt="icon_facebook"/></a>
                            <a href=# ><img src="../images/icon_insta.png" alt="icon_instagram"/></a>
                            <a href=# ><img src="../images/logo_twitter.png" alt="icon_facebook"/></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php include("bas.php");?>
    </body>
</html>
