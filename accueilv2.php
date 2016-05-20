<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="accueilv21.css" />
        <title>Accueil - Sportymates </title>
        <link rel='icon' type="image/ico" href="../images/Logo1.png"/>
    </head>
 
    <body>
        <div id='wrapper'>
            <header style="background-image:url(../images/evening_friends_jump.jpg)">
                <?php 
                include("../banniere_entete.php");
                include("../nav.php");
                ?>
            </header>

            <div id="titreclub">
                <h2>Juste pour découvrir</h2>
                <p>Découvrer nos clubs près de chez vous</p>
            </div>

            <div id="clubs">
                <div class="ccolonne1">
                    <a href=pageclub.html>
                        <h2>Club 1</h2>
                    </a>
                </div>
                <div class="ccolonne2">
                    <a href=pageclub.html>
                        <h2>Club 2</h2>
                    </a>
                </div>
                <div class="ccolonne3">
                    <a href=pageclub.html>
                        <h2>Club 3</h2>
                    </a>
                </div>
            </div>

            <div id="titresection">
                <h2>Explorer nos differents sports</h2>
                <p>Découvre nos sports les plus populaires</p>
            </div>
            <section>
                <div id="sports">
                    <div id="ligne1">
                        <div class="ligne1colonne1">
                            <a href=pagesport.html>
                                <h3>Natation</h3><br>
                            </a>
                        </div>
                        <div class="ligne1colonne2">
                            <a href=pagesport2.html>
                                <h3>Basket</h3><br>
                            </a>
                        </div>
                    </div>
                    <div id="ligne2">
                        <div class="ligne2colonne1">
                            <a href=pagesport.html>
                                <h3>Marche</h3><br>
                            </a>
                        </div>
                        <div class="ligne2colonne2">
                            <a href=pagesport2.html>
                                <h3>Volley</h3><br>
                            </a>
                        </div>
                        <div class="ligne2colonne3">
                            <a href=pagesport.html>
                                <h3>Athlétisme</h3><br>
                            </a>
                        </div>
                    </div>
                    <div  id="ligne3">
                        <div class="ligne3colonne1">
                            <a href=pagesport2.html>
                                <h3>Musculation</h3><br>
                            </a>
                        </div>
                        <div class="ligne3colonne2">
                            <a href=pagesport.html>
                                <h3>Tennis</h3><br>
                            </a>
                        </div>
                    </div>
                    <input class="buttonsport" type="submit" value="Voir tous les sports" onClick="window.location = 'rechercheclub.html'" />
                </div>
            </section>

            <div id="events">
                <div class="photos">
                    <p>
                        <marquee direction="left" scrollamount="12">&nbsp; &nbsp;
                            <img src="http://localhost/Sportymates1/images/e1.jpg" alt="" width="1500" height="500" />;
                            <img src="http://localhost/Sportymates1/images/e2.jpg" alt="" width="1500" height="500" />;
                            <img src="http://localhost/Sportymates1/images/e3.jpg" alt="" width="1500" height="500" />;
                            <img src="http://localhost/Sportymates1/images/e4.jpg" alt="" width="1500" height="500" />;
                        </marquee>
                    </p>

                </div>
            </div>

            <div id='titrecom'>
                <h2 float=center>Notre communauté</h2>
            </div>
            <div id="communaute">
                <a href='nv1.html'>
                    <div class="colonne1">
                        <h2>Nom 1</h2>
                        <p> On va décrire un nouveau membre dire depuis quand  il est inscrit
                            et tout et tout enfin je n'ai pas encore réfléchis à ce qu'on pourrais dire </p>
                    </div>
                </a>
                <a href='nv2.html'>
                    <div class="colonne2">
                        <h2>Nom 2</h2>
                        <p> On va décrire un nouveau membre dire depuis quand  il est inscrit et tout
                            et tout enfin je n'ai pas encore réfléchis à ce qu'on pourrais dire </p>
                    </div>
                </a>
                <a href='nv3.html'>
                    <div class="colonne3">
                        <h2>Nom 3</h2>
                        <p> On va décrire un nouveau membre dire depuis quand  il est inscrit
                            et tout et tout enfin je n'ai pas encore réfléchis à ce qu'on pourrais dire </p>
                    </div>
                </a>
                <a href='nv4.html'>
                    <div class="colonne4">
                        <h2>Nom 4</h2>
                        <p> On va décrire un nouveau membre dire depuis quand  il est inscrit
                            et tout et tout enfin je n'ai pas encore réfléchis à ce qu'on pourrais dire </p>
                    </div>
                </a>
            </div>

            <div id="totpropos">
                <div id="apropos">
                    <div class="photos">
                        <img src="http://localhost/Sportymates1/images/lieux.jpeg" alt="photo lieu">
                    </div>
                    <div class="texte">
                        <h2>A propos</h2>
                        <p> On Sportymates you can find a sport partner near you. <br>
                            No matter if you are looking for a dancing partner, walking partner,<br>
                            a partner to play golf with, or any other sport: with more than<br>
                            ten thousand members, the chances are high that you will find a <br>
                            matching sport partner. Sportymates is set up for this specific reason,<br>
                            namely matching sport partners in their local areas. This is why it has<br>
                            been successful for years already .
                        </p>
                        <input class="buttonapropos" type="submit" value="En savoir plus" />
                    </div>
                </div>
            </div>

            <div id="contacts">
                <div class="contacttexte">
                    <h1> Nous Contacter</h1>
                    <p>A deux pas des Halles, c'est en 1986 que Toni et Juliette<br>
                        ouvrent Azteca, un endroit dédié à la fête et à la convivialité,<br>
                        rue Sauval dans le 1er arrondissement de Paris. Au rez de chaussé, <br>
                        quelques tables accueillent les amateurs de cuisine mexicaine en <br>
                        toute décontraction. Richement décoré de tableaux, tapis mexicains,<br>
                        montures de cavaliers et palmier fantaisie, c'est un endroit qui reunit<br>
                        beaucoup d'habitués qui aiment discuter avec Toni et Simon qui sauront <br>
                        vous raconter le Mexique avec passion.</p>
                    <input class="buttonapropos" type="submit" value="Nous contacter"onClick="window.location = 'nouscontacter.html'"/>
                </div>
                <div id="map">

                </div>
                <script>
                    function initMap() {
                        var mapDiv = document.getElementById('map');
                        var map = new google.maps.Map(mapDiv, {
                            center: {lat: 48.8534100 , lng: 2.3488000 },
                            mapTypeId:google.maps.MapTypeId.ROADMAP,
                            /*  google.maps.MapTypeId.SATELLITE,
          google.maps.MapTypeId.HYBRID,
          google.maps.MapTypeId.TERRAIN,*/
                            zoom:12
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"   async defer></script>
            </div>
            <?php
            include('../bas.php');
            ?>
        </div>
    </body>
</html>