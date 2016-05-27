<?php session_start();?> 

<!DOCTYPE html>
<html>

<?php
    var_dump($_GET["identifiant"]);
    $idGroupe = $_GET["identifiant"];
	try
		{
    	$bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8', 'Vincent', '');
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

	catch (Exception $e)
		{
        die('Erreur : ' . $e->getMessage());
		}
	$reponse = $bdd->query("SELECT * FROM groupe WHERE nomGroupe = '$idGroupe'");
	$donnees = $reponse->fetch();
	var_dump($donnees["nomGroupe"]);
?>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style_profilGroup.css"/>
        <title><?php echo $donnees["nomGroupe"]; ?> - Groupe Sportymates </title>
        <link rel='icon' type="image/ico" href="Logo1.png"/>
    </head>
    <body>

        <div id="bloc_page">
            <header>
                <?php include("banniere_entete.php");?>
                <div id="Titre">
                    <h1><?php echo $donnees["nomGroupe"]; ?></h1><br>
                    <h2><?php echo $donnees["nomSport"]; ?> <div id = "type"> <?php echo $donnees["niveau"]; ?> </div></h2>
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

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d51191.25454448657!2d2.3498680877572555!3d48.85503787947096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1459758273583" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div id="photos">
                        <h1>Photos</h1>
                        <div id="album"> 
                            <img src="images/running1.jpg" alt="running-fever1"/>
                            <img src="images/running2.jpg" alt="running-fever2"/>
                            <img src="images/running3.jpg" alt="running-fever3"/>
                            <img src="images/running4.jpg" alt="running-fever4"/>
                            <img src="images/running_fever.jpg" alt="running-fever5"/>
                            <img src="images/Sport_Running.gif" alt="running-fever6"/>
                        </div>

                    </div>

                    <div id="commentaires">
                        <h1>Commentaires</h1>

                         <?php

                    $reponse2 = $bdd->query("SELECT * FROM commentaire WHERE nomGroupe = '$idGroupe' ORDER BY dateHeure DESC");
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

                        <form method="post" action="cibleCom">
                            <input type="hidden" name="auteur" value="<?php echo $_SESSION["pseudo"]; ?>">
                            <input type="hidden" name="groupe" value="<?php echo $idGroupe; ?>">
                            <textarea type="message" rows="10" cols ="70" name="contenuCom">Tapez votre commentaire ici. </textarea>
                            <br>
                            <input type="submit" class = "bouton" value="Commenter">
                        </form>

                    </div>
                    <?php 
                        }
                    ?>

                <?php
                        $reponse3 = $bdd->query("SELECT * FROM groupeinscrit WHERE nomGroupe = '$idGroupe'");
                        $compteur = 0;
                        while ($nbmembres = $reponse3->fetch()) {
                            $compteur = $compteur + 1;
                        }
                ?>

                </section>
                <section id="droite">
                    <div id="bloc_membres">
                    <?php if (isset($_SESSION['pseudo'])) {

                            $test = 0;
                            $req=$bdd->query("SELECT * FROM groupeinscrit WHERE nomGroupe = '$idGroupe'");
                            while ($donnees3 = $req->fetch()) {

                                if($donnees3['nomUtilisateur'] == $_SESSION['pseudo']){
                                    $test = 1;
                                }
                            }

                            $req->closeCursor();

                            if($test == 1) {
                            ?>

                                <a href="quitter?identifiant=<?php echo $idGroupe; ?>">
                                <button type="button" class="bouton" value="quitter" id="btnQuitter">
                                Quitter</button>
                                </a>

                            <?php
                            }

                            elseif ($test == 0) {

                                if($compteur == $donnees["nbinscritmax"]){

                                    ?>

                                    <a href="alerte?identifiant=<?php echo $idGroupe; ?>">
                                    <button type="button" class="bouton" value="alerte" id="btnAlerte">
                                    Alerte</button>
                                    </a>

                                <?php }

                                elseif ($compteur < $donnees["nbinscritmax"]) {

                                    ?>

                                    <a href="rejoindre?identifiant=<?php echo $idGroupe; ?>">
                                    <button type="button" class="bouton" value="rejoindre" id="btnRejoindre">
                                    Alerte</button>
                                    </a>

                                    <?php

                                }

                            }
                            
                        }

                        else {
                    ?>
                    <p>Connectez-vous pour rejoindre, commenter ou noter le groupe.</p>
                    <?php
                    }
                    ?>

                        <h1>Membres (<?php echo $compteur;?> / <?php echo $donnees["nbinscritmax"];?>)</h1>
                        <div id="membres">
                            <div id="profils">
                                <img src="images/profile.png" alt="profil1"/>
                                <img src="images/profile.png" alt="profil2"/>
                                <img src="images/profile.png" alt="profil3"/>
                                <img src="images/profile.png" alt="profil4"/>
                                <img src="images/profile.png" alt="profil5"/>
                                <img src="images/profile.png" alt="profil6"/>
                            </div>
                        </div>



                    </div>

                    <?php
                    $reponse4 = $bdd->query("SELECT * FROM notergroupe WHERE nomGroupe = '$idGroupe'");
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
                    <h1>Note du groupe</h1>

                    <p class = noteFinale> <?php echo $noteF; ?> / 5</p>
                    <?php 
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                    <form method="post" action="cibleNote">
                        <input type="hidden" name="auteur" value="<?php echo $_SESSION["pseudo"]; ?>">
                        <input type="hidden" name="groupe" value="<?php echo $idGroupe; ?>">
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

                    <div id="planning">
                        <h1>Planning</h1>

                    </div>

                    <div id="Reseaux">
                        <h1>Rejoingnez-nous sur les réseaux sociaux !</h1>
                        <div id="icon">
                            <a href=# ><img src="images/logo_facebook.png" alt="icon_facebook"/></a>
                            <a href=# ><img src="images/icon_insta.png" alt="icon_instagram"/></a>
                            <a href=# ><img src="images/logo_twitter.png" alt="icon_facebook"/></a>
                        </div>

                    </div>
                </section>
            </div>
        </div>
        <?php include("bas.php");?>
    </body>
</html>