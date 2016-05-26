<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Sportymates</title>

        <link rel="stylesheet" href="http://localhost:8888/Sportymates/Vue/Aide/rubrique.css"/>

        <link rel="stylesheet" href="http://localhost:8888/Sportymates/Vue/accueil2.css" />
        <link rel='icon' type="image/ico" href="../images/Logo1.png"/>
    </head>

    <body>
        <div id="wrapper">
            <header style="background-image : url(../Vue/images/friends.jpg);">
                <?php 
                include("../Vue/banniere_entete.php");?>
                <div id="Titre">
                    <h1>Aide</h1><br>
                </div>
                <?php include("../Vue/nav.php");?>

            </header>
            <section id="bloc_principal">
                <div id="recherche">
                    <div id="retour">
                        <a href="aide.php">
                            <img src="../Vue/images/fleche_retour.png" alt="retour_aide"/>
                        </a>
                        <h1 id="question">En quoi pouvons-nous vous aidez ?</h1>
                        <a href="acceuil.php" ><img src="../Vue/images/iconeHome.png" alt="accueilSite"/></a>
                    </div>
                    <form name="Recherche" >
                        <input type="search" name="champ" placeholder="Trouvez votre réponse" size="40" maxlength="50" />
                        <input type="submit" class="bouton" value="Rechercher" />
                    </form>
                </div>

                <div id="FAQ">
                    <?php
                    while ($donnees = $rep->fetch()) {
                    ?>
                    <dl>
                        <dt class=questionFAQ><?php echo $donnees["question"]; ?></dt>
                        <dd class=reponseFAQ><?php echo $donnees["reponse"]; ?></dd>
                    </dl>
                    <?php
                    }
                    ?>
                </div>
            </section>


            <?php
            include('../Vue/bas.php');
            ?>
        </div>
    </body>
</html>