<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style_profilGroup.css"/>
        <title><? echo $titre ?> - Groupe Sportymates </title>
        <link rel='icon' type="image/ico" href="../images/Logo1.png"/>
    </head>
    <body>

        <div id="bloc_page">
            <header style="background-image : url(../images/friends.jpg);">
                <?php include("../banniere_entete.php");?>
                <div id="Titre">
                    <h1><?php echo $titre ?></h1><br>
                    <h2><?php echo $nomSport.' <br> '.$niveau ?></h2>

                </div>
                <?php include("../nav.php");?>

            </header>
            <div id="bloc_centre">
                <section id="gauche">
                    <div id="description">
                        <h1>Description</h1>
                        <p><?php echo $description ?></p>
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
                            <img src="../images/running1.jpg" alt="running-fever1"/>
                            <img src="../images/running2.jpg" alt="running-fever2"/>
                            <img src="../images/running3.jpg" alt="running-fever3"/>
                            <img src="../images/running4.jpg" alt="running-fever4"/>
                            <img src="../images/running_fever.jpg" alt="running-fever5"/>
                            <img src="../images/Sport_Running.gif" alt="running-fever6"/>
                        </div>

                    </div>

                    <div id="commentaires">
                        <h1>Commentaires</h1>

                    </div>
                </section>
                <section id="droite">
                    <div id="bloc_membres">
                        <div id="profilGroupe">
                            <figcaption><?php echo $titre; ?></figcaption>
                            <img alt="<?php echo $titre ?>" src="img-Groupes/<?php echo $imgGroupe; ?>" height="80" width="150"/>
                        </div>
                        <button type="button" class="bouton" id="btnRejoindre">Rejoindre</button>
                        <h1>Membres (<?php echo $nbreMembre; ?>/<?php echo $nbreMax;?>)</h1>
                        <div id="membres">
                            <div id="profils">
                                <img src="../images/profile.png" alt="profil1"/>
                                <img src="../images/profile.png" alt="profil2"/>
                                <img src="../images/profile.png" alt="profil3"/>
                                <img src="../images/profile.png" alt="profil4"/>
                                <img src="../images/profile.png" alt="profil5"/>
                                <img src="../images/profile.png" alt="profil6"/>
                            </div>

                            <button type="button" class="bouton" id="btnMembre">Tous</button>

                        </div>

                    </div>

                    <div id="planning">
                        <h1>Planning</h1>

                    </div>

                    <div id="Reseaux">
                        <h1>Rejoingnez-nous sur les réseaux sociaux !</h1>
                        <div id="icon">
                            <a href=# ><img src="../images/logo_facebook.png" alt="icon_facebook"/></a>
                            <a href=# ><img src="../images/icon_insta.png" alt="icon_instagram"/></a>
                            <a href=# ><img src="../images/logo_twitter.png" alt="icon_facebook"/></a>
                        </div>

                    </div>
                </section>
            </div>
            <?php include("../bas.php");?>
        </div>

    </body>


</html>