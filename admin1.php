<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://localhost/Sportymates1/style/admin1.css" />
        <title>Sportymates</title>
        <link rel="icon" type="image/ico" href=logo3.png />
    </head>

    <body>
        <div id="wrapper">

        <div id="hautaccueil">
            <div id="banniere_image">
                  <div id="logo">
                      <a href=accueilv2.html><img src="http://localhost/Sportymates1/images/Logo1.png" alt="Logo de Sportymates"/></a>
                  </div>
                <h1>Admin</h1>

              <div id="banniere_description">
                <nav>
                    <ul>
                        <li><a href="#">A propos |</a></li>
                        <li><a href="#">Sports |</a></li>
                        <li><a href="#">Nos groupes |</a></li>
                        <li><a href="rechercheclub.html">Nos clubs |</a></li>
                        <li><a href="#">Forum |</a></li>
                        <li><a href="#">Aide</a></li>
                        <div id="rechercher">
                        <input  class="rech" type='text' id='recherche' name='recherche' placeholder=Rechercher... size="20" maxlength="15" >
                        <button type=submit> <img src='images/recherchericon.png' alt='image rechercher'/> </button>
                     </div>
                    </ul>
                  </nav>
               </div>
             </div>
           </div>

         <nav id="barrenavigation">
           <div id="listeboutons">
            <ul>
              <div id="boutons">
            <button class="Utilisateur" onClick="window.location = 'admin1.html'">Utilisateur</button></br>
            <button class="Groupes"onClick="window.location = 'admin2.html'">Groupes</button></br>
            <button class="Clubs"onClick="window.location = 'admin3.html'">Clubs</button></br>
            <button class="Planning"onClick="window.location = 'admin4.html'">Planning</button></br>
            <button class="Forums"onClick="window.location = 'admin5.html'">Forums</button></br>
            <button class="Aide"onClick="window.location = 'admin6.html'">Aide en ligne</button>
           </div>
           </ul>
          </div>
        </nav>

<div id="droite">
  <div class="recherche">
  <h2>Recherche avancée</h2>
  <form>
    <p>
        <label>Nom</label><input type="text" name="pseudo" /> <a href="Modifier.html">Modifier</a>
    </p>
  </form>
  </div>


</div>

    </body>
</html>
