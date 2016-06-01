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
        <title>Créer une rubrique - Sportymates</title>
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
                <h1>Créer une rubrique</h1>
                <form method="post" action="creerRubriques_post.php" enctype="multipart/form-data">
                    <div id="formulaire">
                        <div id="label">
                            <label for="reponse">Réponses: </label> <br>
                            <label for="question">Questions :</label><br>
                            <label for="categorie">Catégorie :</label><br>

                        </div>
                        <div id="input">

                           <textarea name="reponse" rows="5" cols="5" spellcheck="true" wrap="soft" >Ajouter une question</textarea>
                          <textarea name="question" rows="5" cols="5" spellcheck="true" wrap="soft" >Ajouter une réponse</textarea>

                          <select name="categorie" required>
                              <option value="Compte">Compte</option>
                              <option value="groupe">groupe</option>
                              <option value="evenement">evenement</option>
                              <option value="forum">forum</option>
                              <option value="sport">sport</option>
                              <option value="club">club</option>

                          </select><br>

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
