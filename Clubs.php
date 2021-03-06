<?php
session_start();
require_once("../modele/connect.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../style/styleClubs.css"/>
        <title>Clubs - Sportymates </title>
        <link rel='icon' type="image/ico" href="../images/log.png"/>
    </head>

    <body>
        <div id="bloc_page">
              <div id='wrapper'>

                <header style="background-image:url(../images/club.jpg)">
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
                <h2>Recherche</h2>
                <div id="bloc_rech">
                    <div id="rechSimple">

                        <form name="Recherche simple" id ="formRechSimple">
                            <input type="search" name="champ" placeholder="Saisir le nom du groupe" size="40"/>
                            <button type="button" class="bouton" id="AfficherRechAvancee" onclick="afficher_masquer()" >Afficher la recherche avancée</button>

                        </form>


                    </div>

                    <div id="RechAvancee" style="display:none">
                        <form method ="post" name="RechercheAvancee">
                            <div id="critereGauche">
                                <label for="nomClub">Nom : </label>
                                <input type="search" name="champ"/><br><br>

                                <label for="ville">Ville : </label>
                                <input type="search" name="champ"/><br><br>
                                <label for="note">Note</label>
                                <select name="note">
                                    <option value="3plus">3 étoiles ou plus</option>
                                    <option value="4plus">4 étoiles ou plus</option>
                                    <option value="5">5 étoiles</option>
                                </select>
                            </div>

                            <div id="critereDroite">
                                <p>Sport(s) associé(s)</p><br>
                                <div id="sports">
                                    <label for="football"><input type="checkbox" name ="football"/> Football</label>
                                    <label for="natation"><input type="checkbox" name ="natation"/> Natation</label>
                                    <label for="volleyball"><input type="checkbox" name ="volleyball"/> Volley-ball</label>
                                    <label for="danse"><input type="checkbox" name ="danse"/> Danse</label>
                                    <label for="basket"><input type="checkbox" name ="basket"/> Basket</label>
                                    <label for="badminton"><input type="checkbox" name ="badminton"/> Badminton</label>
                                    <label for="tennis"><input type="checkbox" name ="tennis"/> Tennis</label>
                                    <label for="handball"><input type="checkbox" name ="handball"/> Handball</label>
                                    <label for="golf"><input type="checkbox" name ="golf"/> Golf</label>
                                    <label for="rugby"><input type="checkbox" name ="rugby"/> Rugby</label>

                                    <label for="athletisme"><input type="checkbox" name ="athletisme"/> Athlétisme</label>
                                    <label for="baseball"><input type="checkbox" name ="baseball"/> Baseball</label><br>

                                    <label for="autres"><input type="checkbox" name ="autres" id="checkboxAutres" onclick="check()"/> Autres <input type="search" name="champ" id="champAutres" style="display:none"/></label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <input type="submit" name="bouton" class="bouton" value="Rechercher"/>
                    <?php
                    if(empty($_SESSION['pseudo'])){
                    }else{
                    ?>
                    <button type="button" name="bouton" class="bouton" id="creerClubs" onclick="window.location='creerClub.php'">creer un club</button>
                <?php  }?>
                </div>
            </section>

            <section id="groupeRecent">
                <h2>Clubs récemment ajoutés</h2>


                                <div id="ajout_recent">
                          <?php
                                    $reponse = $bdd->query('SELECT nomClub, imgClub FROM club ORDER BY jourOuverture DESC LIMIT 0, 3');

                                    while($donnees = $reponse->fetch())
                                    {
                                    ?>
                                    <figure>
                                        <a href="../vue/pageclub.php?identifiant=<?php echo $donnees['nomClub'];?>">
                                            <img src="Clubs/img-Clubs/<?php echo $donnees['imgClub']; ?>" alt = <?php echo $donnees['nomClub'];?>/>
                                            <figcaption>
                                                <?php echo $donnees['nomClub'];?>
                                            </figcaption>
                                        </a>

                                    </figure>

                                    <?php
                                    }
                                    ?>
                                </div>
                  <button type="button" name="bouton" class="bouton" id="tousClubs" onclick="window.location='../controleur/all.php?theme=groupe'" >Tous les clubs</button>

            </section>

            <section>
                <h2>Trouve un Club près de chez toi !</h2>
                <div id="carte">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d51191.25454448657!2d2.3498680877572555!3d48.85503787947096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1459758273583" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </section>
            <?php
            include('bas.php');
            ?>
        </div>

        <script>
            //afficher/masquer les critères de recherche avancée
            function afficher_masquer(){
                var block = document.getElementById('RechAvancee');
                var lien = document.getElementById('AfficherRechAvancee');

                if (block.style.display == 'none')
                {
                    block.style.display='block';
                    lien.innerHTML='Masquer';
                }
                else
                {
                    block.style.display = 'none';
                    lien.innerHTML='Afficher la recherche avancée';
                }
            }

            //afficher un champ lorsque la case Autres est cochée
            function check(){
                if (document.getElementById("checkboxAutres").checked){
                    document.getElementById("champAutres").style.display="block";
                }
                else{
                    document.getElementById("champAutres").style.display="none";
                }
            }
        </script>
    </body>

</html>
