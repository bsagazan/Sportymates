<?php
session_start();
$titre="Administration Forum";
$balises = true;
include("../modele/connect.php");
include("../modele/debut.php");
include("../modele/menu.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/admin.css" />
    </head>

    <body>

      <div id='wrapper'>
        <header style="background-image:url(../images/friends.jpg)">
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

    <?php
    // On indique o l'on se trouve
    $cat = (isset($_GET['cat']))?htmlspecialchars($_GET['cat']):'';
    //echo'<p><i>Vous êtes ici</i> : <a href="../vue/Forum/index.php">Index du forum</a> -->  <a href="../vue/admin.php">Administration du forum</a>';
    if (!verif_auth(ADMIN)) erreur(ERR_AUTH_ADMIN);
    switch($cat)
    {
    case "config":
            //ici configuration
            echo'<section id="recherche">
                  <br/>
                    <div id="retour">
                    <div id="question">
                      <h2>Configuration du forum</h2>
                      <p><i>Vous êtes ici</i> : <a href="../vue/Forum/index.php">Index du forum</a> -->
                      <a href="../vue/admin.php">Administration du forum</a>--> Configuration du forum</p>
                  </section>';

            echo '<form method="post" action="adminok.php?cat=config">';
            //Le tableau associatif
            $config_name = array(
            "avatar_maxsize" => "Taille maximale de l avatar",
            "avatar_maxh" => "Hauteur maximale de l avatar",
            "avatar_maxl" => "Largeur maximale de l avatar",
            "sign_maxl" => "Taille maximale de la signature",
            "auth_bbcode_sign" => "Autoriser le bbcode dans la signature",
            "pseudo_maxsize" => "Taille maximale du pseudo",
            "pseudo_minsize" => "Taille minimale du pseudo",
            "topic_par_page" => "Nombre de topics par page",
            "post_par_page" => "Nombre de posts par page",
            "forum_titre" => "Titre du forum"
            );
            $query = $bdd->query('SELECT config_nom, config_valeur FROM forum_config');
            ?>
            <br/>
            <?php
            while($data=$query->fetch())
            {
               echo '
               <label for='.$data['config_nom'].'>'.$config_name[$data['config_nom']].' </label> :
               <input type="text" id="'.$data['config_nom'].'" value="'.$data['config_valeur'].'" name="'.$data['config_nom'].'"';
            }
            echo '<br/>
            <br/><input type="submit" value="Envoyer" class="boutons"/>
            </form>';
            $query->CloseCursor();
    break;

    case "forum":
    //Ici forum
    $action = isset($_GET['action']);
     //On récupère la valeur de action
            switch($action) //2eme switch
            {

            case "creer":
            //Création d'un forum
            //1er cas : pas de variable c
            if(empty($_GET['c']))
            {
                    echo'<br /><br /><br />Que voulez-vous faire?<br />
                    <a href="admin.php?cat=forum&action=creer&c=f">Créer un forum</a><br />
                    <a href="admin.php?cat=forum&action=creer&c=c">Créer une catégorie</a></br>';
            }
            //2ème cas : on cherche à créer un forum (c=f)
            elseif($_GET['c'] == "f")
            {
                    $query=$bdd->query('SELECT cat_id, cat_nom FROM forum_categorie
                    ORDER BY cat_ordre DESC');
                    echo'<h1>Création d un forum</h1>';
                    echo'<form method="post" action="adminok.php?cat=forum&action=creer&c=f">';
                    echo'<label>Nom :</label><input type="text" id="nom" name="nom" /><br /><br />
                    <label>Description :</label>
                    <textarea cols=40 rows=4 name="desc" id="desc"></textarea>
                    <br /><br />
                    <label>Catégorie : </label><select name="cat">';
                    while($data = $query->fetch())
                    {
                        echo'<option value="'.$data['cat_id'].'">'.$data['cat_nom'].'</option>';
                    }
                    echo'</select><br /><br />
                    <input type="submit" value="Envoyer"></form>';
                    $query->CloseCursor();
            }
            //3ème cas : on cherche à créer une catégorie (c=c)
            elseif($_GET['c'] == "c")
            {
                    echo'<h1>Création d une catégorie</h1>';
                    echo'<form method="post" action="adminok.php?cat=forum&action=creer&c=c">';
                    echo'<label> Indiquez le nom de la catégorie :</label>
                    <input type="text" id="nom" name="nom" /><br /><br />
                    <input type="submit" value="Envoyer"></form>';
            }
        break;



        case "edit":
        //Edition d'un forum
        echo'<h1>Edition d un forum</h1>';

        if(!isset($_GET['e']))
        {
                echo'<p>Que voulez vous faire ?<br />
                <a href="admin.php?cat=forum&action=edit&amp;e=editf">
                Editer un forum</a><br />
                <a href="admin.php?cat=forum&action=edit&amp;e=editc">
                Editer une catégorie</a><br />
                <a href="admin.php?cat=forum&action=edit&amp;e=ordref">
                Changer l ordre des forums</a><br />
                <a href="admin.php?cat=forum&action=edit&amp;e=ordrec">
                Changer l ordre des catégories</a>
                <br /></p>';
        }
        elseif($_GET['e'] == "editf")
        {
            //On affiche dans un premier temps la liste des forums
            if(!isset($_POST['forum']))
            {
                $query=$bdd->query('SELECT forum_id, forum_name
                FROM forum_forum ORDER BY forum_ordre DESC');

                echo'<form method="post" action="admin.php?cat=forum&amp;action=edit&amp;e=editf">';
                echo'<p>Choisir un forum :</br /></h2>
                <select name="forum">';

                while($data = $query->fetch())
                {
                    echo'<option value="'.$data['forum_id'].'">
                    '.stripslashes(htmlspecialchars($data['forum_name'])).'</option>';
                }
                echo'<input type="submit" value="Envoyer"></p></form>';
                $query->CloseCursor();
            }
            //Ensuite, on affiche les renseignements sur le forum choisi
            else
            {
                $query = $bdd->prepare('SELECT forum_id, forum_name, forum_desc,
                forum_cat_id
                FROM forum_forum
                WHERE forum_id = :forum');
                $query->bindValue(':forum',(int) $_POST['forum'],PDO::PARAM_INT);
                $query->execute();

                $data1 = $query->fetch();
                echo'<p>Edition du forum
                <strong>'.stripslashes(htmlspecialchars($data1['forum_name'])).'</strong></p>';

                echo'<form method="post" action="adminok.php?cat=forum&amp;action=edit&amp;e=editf">
                <label>Nom du forum : </label><input type="text" id="nom"
                name="nom" value="'.$data1['forum_name'].'" />
                <br />

                <label>Description :</label><textarea cols=40 rows=4 name="desc"
                id="desc">'.$data1['forum_desc'].'</textarea><br /><br />';
                $query->CloseCursor();
                //A partir d'ici, on boucle toutes les catégories,
                //On affichera en premier celle du forum
                $query = $bdd->query('SELECT cat_id, cat_nom
                FROM forum_categorie ORDER BY cat_ordre DESC');
                echo'<label>Déplacer le forum vers : </label>
                <select name="depl">';
                while($data2 = $query->fetch())
                {
                    if($data2['cat_id'] == $data1['forum_cat_id'])
                    {
                    echo'<option value="'.$data2['cat_id'].'"
                    selected="selected">'.stripslashes(htmlspecialchars($data2['cat_nom'])).'
                    </option>';
                    }
                    else
                    {
                        echo'<option value="'.$data2['cat_id'].'">'.$data2['cat_nom'].'</option>';
                    }
                }
                echo'</select><input type="hidden" name="forum_id" value="'.$data1['forum_id'].'">';
                echo'<p><input type="submit" value="Envoyer"></p></form>';
                $query->CloseCursor();

            }
        }
        elseif($_GET['e'] == "editc")
        {
            //On commence par afficher la liste des catégories
            if(!isset($_POST['cat']))
            {
                $query = $bdd->query('SELECT cat_id, cat_nom
                FROM forum_categorie ORDER BY cat_ordre DESC');
                echo'<form method="post" action="admin.php?cat=forum&amp;action=edit&amp;e=editc">';
                echo'<p>Choisir une catégorie :</br />
                <select name="cat">';
                while($data = $query->fetch())
                {
                    echo'<option value="'.$data['cat_id'].'">'.$data['cat_nom'].'</option>';
                }
                echo'<input type="submit" value="Envoyer"></p></form>';
                $query->CloseCursor();
            }
            //Puis le formulaire
            else
            {
                $query = $bdd->prepare('SELECT cat_nom FROM forum_categorie
                WHERE cat_id = :cat');
                $query->bindValue(':cat',(int) $_POST['cat'],PDO::PARAM_INT);
                $query->execute();
                $data = $query->fetch();
                echo'<form method="post" action="adminok.php?cat=forum&amp;action=edit&amp;e=editc">';
                echo'<label> Indiquez le nom de la catégorie :</label>
                <input type="text" id="nom" name="nom"
                value="'.stripslashes(htmlspecialchars($data['cat_nom'])).'" />
                <br /><br />
                <input type="hidden" name="cat" value="'.$_POST['cat'].'" />
                <input type="submit" value="Envoyer" /></p></form>';
                $query->CloseCursor();

            }
        }
        elseif($_GET['e'] == "ordref")
        {
            $categorie="";
            $query = $bdd->query('SELECT forum_id, forum_name, forum_ordre,
            forum_cat_id, cat_id, cat_nom
            FROM forum_categorie
            LEFT JOIN forum_forum ON cat_id = forum_cat_id
            ORDER BY cat_ordre DESC');
            echo'<form method="post"
            action="adminok.php?cat=forum&amp;action=edit&amp;e=ordref">';

            echo '<table>';
            while($data = $query->fetch())
            {
                if( $categorie !== $data['cat_id'] )
                {
                    $categorie = $data['cat_id'];
                    echo'
                    <tr>
                    <th><strong>'.stripslashes(htmlspecialchars($data['cat_nom'])).'</strong></th>
                    <th><strong>Ordre</strong></th>
                    </tr>';
                }
                echo'<tr><td>
                <a href="voirforum.php?f='.$data['forum_id'].'">'.$data['forum_name'].'</a></td>
                <td><input type="text" value="'.$data['forum_ordre'].'" name="'.$data['forum_id'].'" />
                </td></tr>';
            }
            echo'</table>
            <p><input type="submit" value="Envoyer" /></p></form>';

        }
        elseif($_GET['e'] == "ordrec")
        {
            $query = $bdd->query('SELECT cat_id, cat_nom, cat_ordre
            FROM forum_categorie
            ORDER BY cat_ordre DESC');

            echo'<form method="post" action="adminok.php?cat=forum&amp;action=edit&amp;e=ordrec">';
            while($data = $query->fetch())
            {
                echo'<label>'.stripslashes(htmlspecialchars($data['cat_nom'])).' :</label>
                <input type="text" value="'.$data['cat_ordre'].'"name="'.$data['cat_id'].'" /><br /><br />';
            }
            echo '<input type="submit" value="Envoyer" /></form>';
            $query->CloseCursor();
        }
        break;

        case "droits":

        //Gestion des droits
        echo'<h1>Edition des droits</h1>';

        if(!isset($_POST['forum']))
        {
            $query=$bdd->query('SELECT forum_id, forum_name
            FROM forum_forum ORDER BY forum_ordre DESC');
            echo'<form method="post" action="admin.php?cat=forum&action=droits">';
            echo'<p>Choisir un forum :</br />
            <select name="forum">';
            while($data = $query->fetch())
            {
                echo'<option value="'.$data['forum_id'].'">'.$data['forum_name'].'</option>';
            }
            echo'<input type="submit" value="Envoyer"></p></form>';
            $query->CloseCursor();
        }
        else
        {
            $query = $bdd->prepare('SELECT forum_id, forum_name, auth_view,
            auth_post, auth_topic, auth_annonce, auth_modo
            FROM forum_forum WHERE forum_id = :forum');
            $query->bindValue(':forum',(int) $_POST['forum'], PDO::PARAM_INT);
            $query->execute();

            echo '<form method="post" action="adminok.php?cat=forum&action=droits"><p><table><tr>
            <th>Lire</th>
            <th>Répondre</th>
            <th>Poster</th>
            <th>Annonce</th>
            <th>Modérer</th>
            </tr>';
            $data = $query->fetch();

            //Ces deux tableaux vont permettre d'afficher les résultats
            $rang = array(
            VISITEUR=>"Visiteur",
            INSCRIT=>"Membre",
            MODO=>"Modérateur",
            ADMIN=>"Administrateur");
            $list_champ = array("auth_view", "auth_post", "auth_topic","auth_annonce", "auth_modo");

            //On boucle
            foreach($list_champ as $champ)
            {
                echo'<td><select name="'.$champ.'">';
                for($i=1;$i<5;$i++)
                {
                    if ($i == $data[$champ])
                    {
                        echo'<option value="'.$i.'" selected="selected">'.$rang[$i].'</option>';
                    }
                    else
                    {
                        echo'<option value="'.$i.'">'.$rang[$i].'</option>';
                    }
                }
                echo'</td></select>';
            }
            echo'<br /><input type="hidden" name="forum_id" value="'.$data['forum_id'].'" />
            <input type="submit" value="Envoyer"></p></form>';
            $query->CloseCursor();
        break;
        }


        default://action n'est pas remplie, on affiche le menu
        echo
        '<section id="recherche">
              <br/>
                <div id="retour">
                <div id="question">
                  <h2>Administration des forums</h2>
                  <p><i>Vous êtes ici</i> : <a href="../vue/Forum/index.php">Index du forum</a> -->
                  <a href="../vue/admin.php">Administration du forum</a>--> Administration du forum</p>
              </section>';
        echo'
        <br />
        <a href="admin.php?cat=forum&amp;action=creer">Créer un forum</a>
        <br />
        <a href="admin.php?cat=forum&amp;action=edit">Modifier un forum</a>
        <br />
        <a href="admin.php?cat=forum&amp;action=droits">
        Modifier les droits d un forum</a><br /></p>';
        break;
        }
break;
default: //cat n'est pas remplie, on affiche le menu général
echo' <section id="recherche">
      <br/>
        <div id="retour">
          <a href="admin1.php">
          <img src="../images/fleche_retour.png" alt="retour_aide"/>
          </a>
        <div id="question">
          <h2>Bienvenue dans la gestion du forum</h2>
          <p><i>Vous êtes ici</i> : <a href="../vue/Forum/index.php">Index du forum</a> -->
          <a href="../vue/admin.php">Administration du forum</a></p>
        </div>
          <a href="../vue/accueilv2.php" ><img src="../images/iconeHome.png" alt="accueilSite"/></a>
        </div>
      </section>

      <section id="bloc-rubrique">
       <div class="ligne">

       <a href="admin.php?cat=config" class="rubrique">
       <h3>Configuration du forum</h3>
      <p>Vous trouverez ici la possibilité de modifier et configurer les paramètres du forum </p>
      </a><br />

      <a href="admin.php?cat=forum" class="rubrique">
      <h3>Administration des forums</h3>
      <p>Vous trouverez ici la possibilité de créer, modifier un forum et son administration</p>
      </a><br />
      </div>
    </section>';
   }

  include('bas.php');
  ?>
  </div>
  </body>
  </html>
