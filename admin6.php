<?php
session_start();
require_once("../modele/connect.php");

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/accueilv2.css" />
        <link rel="stylesheet" href="../style/admin5.css" />
        <title>Sportymates</title>
        <link rel="icon" type="image/ico" href=logo3.png />
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


  <section id="recherche">
    <br/>
    <div id="retour">
     <h2 id="question">Modérer les messages du forum</h2>
   </div>
  </section>

  <br/>
<div id="affichage">
  <table>
    <tr id="attribut">
      <td> Post id </td>
      <td> Post créateur </td>
      <td> Post messages</td>
      <td> topic titre </td>
      <td> Post forum_id </td>
      <td> </td>
    </tr>
    <?php
    $reponse = $bdd->query('SELECT * FROM forum_post INNER JOIN forum_topic ON forum_post.topic_id = forum_topic.topic_titre AND INNER JOIN forum_forum ON forum_post.post_forum_id = forum_forum.forum_name
');

      while ($donnees = $reponse->fetch())
      {
    ?>
    <tr>
      <td> <?php echo $donnees['post_id']; ?></td>
      <td> <?php echo $donnees['post_createur']; ?></td>
      <td> <?php echo $donnees['post_texte']; ?></td>
      <td> <?php echo $donnees['topic_titre']; ?></td>
      <td> <?php echo $donnees['forum_name']; ?></td>
      <td><input type="button" class="bouton" name="supprimer" value="Supprimer"></a></td>
    </tr>
    <?php

      }
      $reponse->closeCursor();
    ?>
    </div>
    <br/>
    </div>

    </body>
</html>
