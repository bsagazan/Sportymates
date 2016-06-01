<?php
session_start();
require_once("../modele/connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../style/accueilv2.css" />
        <link rel="stylesheet" href="../style/styleCreerGroupe.css" />
        <title>Créer un club - Sportymates</title>
        <link rel='icon' type="image/ico" href="../images/Logo1.png"/>
    </head>

    <body>
        <div id='wrapper'>
        <div id="bloc_page">

            <header style="background-image:url(../images/activites.jpg)">
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

            <section>
                <h1>Créer un club</h1>
                <form method="post" action="creerClub_post.php" enctype="multipart/form-data">
                    <div id="formulaire">
                        <div id="label">
                            <label for="nomClub">Nom du club : </label><br>
                            <label for="adresse">Adresse : </label> <br>
                            <label for="telephone">Téléphone:</label><br>
                            <label for="heureOuverture">Heure d'ouverture :</label><br>
                            <label for="heureFermeture">Heure de fermeture : </label><br>
                            <label for="jourOuverture">Jour d'ouverture :</label><br>
                            <label for="jourFermeture">Jour de fermeture : </label><br>
                            <label for="imgClub">Image du club :</label><br>
                            <label for="description">Description :</label>


                        </div>
                        <div id="input">

                            <input type="text" name="nomClub" required autofocus/><br>
                            <input type="text" name="adresse" required autofocus/><br>
                            <input type="tel" name="telephone" required autofocus/><br>
                            <input type="time" name="heureOuverture"/><br>
                            <input type="time" name="heureFermeture"/><br>
                            <select name="jourOuverture" required>
                                <option value="lundi">lundi</option>
                                <option value="mardi">mardi</option>
                                <option value="mercredi">mercredi</option>
                                <option value="jeudi">jeudi</option>
                                <option value="vendredi">vendredi</option>
                                <option value="samedi">samedi</option>
                                <option value="dimanche">dimanche</option>
                            </select><br>
                            <select name="jourFermeture" required>
                              <option value="lundi">lundi</option>
                              <option value="mardi">mardi</option>
                              <option value="mercredi">mercredi</option>
                              <option value="jeudi">jeudi</option>
                              <option value="vendredi">vendredi</option>
                              <option value="samedi">samedi</option>
                              <option value="dimanche">dimanche</option>
                            </select><br>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                            <input type="file" name="imgClub"/><br>
                            <textarea name="description" rows="5" cols="5" spellcheck="true" wrap="soft" >Ajouter une description du groupe</textarea>

                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Valider" class="bouton" id="btnEnvoyer"/>
                    </div>
                </form>
            </section>
            <?php include("bas.php");?>
        </div>
      </div>
    </body>
</html>
