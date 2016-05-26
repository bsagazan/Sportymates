<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>Sportymates</title>
        <link rel="stylesheet" href="http://localhost:8888/Sportymates/Vue/Aide/pageaide.css"/>
        <link rel="stylesheet" href="http://localhost:8888/Sportymates/Vue/accueil2.css" />
        <link rel="icon" type="image/ico" href="../Vue/images/logo3.png" />
    </head>


    <body>
        <div id='wrapper'>
            <header style="background-image:url(http://localhost:8888/Sportymates/Vue/images/header-activite.jpg)">
                <?php
                include("../Vue/banniere_entete.php");
                include("../Vue/nav.php");
                ?>
            </header>

            <section id="recherche">
                <h1 id="question">En quoi pouvons-nous vous aidez ?</h1>

                <form name="Recherche" >
                    <input type="search" name="champ" placeholder="Trouvez votre réponse" size="40" maxlength="50" />
                    <input type="submit" class="bouton" value="Rechercher" />

                </form>
            </section>

            <section id="bloc-rubrique">

                <div class="ligne">


                    <a href="aide.php?rub=compte" class="rubrique">
                        <h2>Compte</h2>
                        <p>Vous trouverez ici de l'aide sur la gestion de votre compte ou sur des problèmes liés à celui-ci.</p>
                    </a>



                    <a href="aide.php?rub=groupe" class="rubrique">
                        <h2>Groupe</h2>
                        <p>Vous obtiendrez ici de l'aide sur la création et la gestion des groupes.</p>
                    </a>

                    <a href="aide.php?rub=evenement" class="rubrique">
                        <h2>Evènement</h2>
                        <p>De l'aide sur la création et sur la gestion d'évènement est disponible ici.</p>
                    </a>

                </div>

                <div class="ligne">

                    <a href="aide.php?rub=forum" class="rubrique">
                        <h2>Forum</h2>
                        <p>Vous trouverez ici de l'aide sur les foncionnalités du forum.</p>
                    </a>



                    <a href="aide.php?rub=sport" class="rubrique">
                        <h2>Sport</h2>
                        <p>Si vous avez des questions concernant les sports proposez votre réponse est surement dans cette section.</p>
                    </a>



                    <a href="aide.php?rub=club" class="rubrique">
                        <h2>Club</h2>
                        <p>Vous pouvez trouver dans cette rubrique de l'aide concernant les clubs.</p>
                    </a>

                </div>
            </section>

            <?php
            include('../Vue/bas.php');
            ?>
        </div>
    </body>
</html>
