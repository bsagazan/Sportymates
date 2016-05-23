<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="styleCreerGroupe.css"/>
        <title>Créer un groupe - Sportymates</title>
        <link rel='icon' type="image/ico" href="../images/Logo1.png"/>
    </head>

    <body>
        <div id="bloc_page">
            <header>
                <?php include("../enteteSimple.php");?>
            </header>

            <section>
                <h1>Créer un groupe</h1>
                <form method="post" action="../../Modele/Groupes/creerGroupe_post.php" enctype="multipart/form-data">
                    <div id="formulaire">
                        <div id="label">
                            <label for="nomGroupe">Nom du groupe : </label><br>
                            <label for="sport">Sport : </label> <br>
                            <label for="niveau">Niveau :</label><br>
                            <label for="ville">Ville :</label><br>
                            <label for="idClub">Club : </label><br>
                            <label for="leader">Leader :</label><br>
                            <label for="nbreMax">Nombre de membre maximum : </label><br>
                            <label for="imgGroupe">Image du groupe :</label><br>
                            <label for="description">Description :</label>
                            
                        </div>
                        <div id="input">

                            <input type="text" name="nomGroupe" required autofocus/><br> 
                            <select name="sport">

                                <?php

                                try
                                {
                                    $bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8','root','root');
                                }
                                catch(Exception $e)
                                {
                                    die('Erreur : ' . $e->getMessage());
                                }

                                $rep = $bdd->query('SELECT nomSport FROM sport');
                                while($don = $rep->fetch()){
                                ?>
                                <option value="<?php echo $don["nomSport"];?>"><?php echo $don["nomSport"];?></option>
                                <?php 
                                }
                                ?>


                            </select><br>
                            <select name="niveau" required>
                                <option value="debutant">Débutant</option>
                                <option value="intermediaire">Intermédiaire</option>
                                <option value="experimente">Expérimenté</option>
                            </select><br>
                            <input type="text" name="ville" required /><br>
                            <select name="idClub">

                                <?php

                                $rep = $bdd->query('SELECT nomClub, idClub FROM club');
                                while($don = $rep->fetch()){
                                ?>
                                <option value="<?php echo $don["idClub"];?>"><?php echo $don["nomClub"];?></option>
                                <?php 
                                }
                                ?>
                            </select><br>
                            <input type="text" name="nomLeader" required /><br>
                            <input type="number" name="nbreMax" min="2" max="50" required /><br>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                            <input type="file" name="imgGroupe"/><br>
                            <textarea name="description" rows="5" cols="5" spellcheck="true" wrap="soft" >Ajouter une description du groupe</textarea>

                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Valider" class="bouton" id="btnEnvoyer"/>
                    </div>
                </form>
            </section>
            <?php include("../bas.php");?>
        </div>
    </body>
</html>