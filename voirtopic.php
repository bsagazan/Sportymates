<?php
session_start();
$titre="Voir un sujet";
include("../modele/connect.php");
include("../modele/debut.php");
include("../modele/menu.php");
include("../modele/bbcode.php");
?>
<body>
  	<div id='wrapper'>
          <header style="background-image:url(../images/forum.jpg)">
            <?php
            if(empty($_SESSION['pseudo'])){
              include("../entete.php");
              include("../nav.php");
            }else{
              include("../entete2.php");
              include("../nav.php");
            }
            ?>
        </header>
<?php
//On récupère la valeur de t
$topic = (int) $_GET['t'];

//A partir d'ici, on va compter le nombre de messages pour n'afficher que les 15 premiers
$query=$bdd->prepare('SELECT topic_titre, topic_post, forum_topic.forum_id, topic_last_post,
forum_name, auth_view, auth_topic, auth_post
FROM forum_topic
LEFT JOIN forum_forum ON forum_topic.forum_id = forum_forum.forum_id
WHERE topic_id = :topic');
$query->bindValue(':topic',$topic,PDO::PARAM_INT);
$query->execute();
$data=$query->fetch();
$forum=$data['forum_id'];
$totalDesMessages = $data['topic_post'] + 1;
$nombreDeMessagesParPage = 15;
$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);
?>
<?php
echo '<p><i>Vous êtes ici</i> : <a href="../vue/forum/index.php">Index du forum</a> -->
<a href="voirforum.php?f='.$forum.'">'.stripslashes(htmlspecialchars($data['forum_name'])).'</a>
 --> <a href="voirtopic.php?t='.$topic.'">'.stripslashes(htmlspecialchars($data['topic_titre'])).'</a>';
 ?>
 <section id="titreforum">
   <h1 id="forum"><?php echo '<h1>'.stripslashes(htmlspecialchars($data['topic_titre'])).'</h1><br /><br />';?></h1>
 </section>
 <br/>

<?php
//Nombre de pages
$page = (isset($_GET['page']))?intval($_GET['page']):1;

//On affiche les pages 1-2-3 etc...
echo '<p>Page : ';
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
    if ($i == $page) //On affiche pas la page actuelle en lien
    {
    echo $i;
    }
    else
    {
    echo '<a href="voirtopic.php?t='.$topic.'&page='.$i.'">
    ' . $i . '</a> ';
    }
}
echo'</p>';

$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;


//On affiche l'image répondre
echo'<a href="../vue/forum/poster.php?action=repondre&amp;t='.$topic.'">
<img src="../images/Repondre.gif" alt="Répondre" title="Répondre à ce topic" /></a>';

//On affiche l'image nouveau topic
echo'<a href="../vue/forum/poster.php?action=nouveautopic&amp;f='.$data['forum_id'].'">
<img src="../images/Nouveau.gif" alt="Nouveau topic" title="Poster un nouveau topic" /></a>';
$query->CloseCursor();
//Enfin on commence la boucle !
?>
<?php
$query=$bdd->prepare('SELECT post_id , post_createur , post_texte , post_time ,
membre_id, membre_pseudo, membre_inscrit, membre_avatar, membre_localisation, membre_post, membre_signature
FROM forum_post
LEFT JOIN forum_membres ON forum_membres.membre_id = forum_post.post_createur
WHERE topic_id =:topic
ORDER BY post_id
LIMIT :premier, :nombre');
$query->bindValue(':topic',$topic,PDO::PARAM_INT);
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nombreDeMessagesParPage,PDO::PARAM_INT);
$query->execute();

//On vérifie que la requête a bien retourné des messages
if ($query->rowCount()<1)
{
        echo'<p>Il n y a aucun post sur ce topic, vérifiez l url et reessayez</p>';
}
else
{
        //Si tout roule on affiche notre tableau puis on remplit avec une boucle
        ?><table>
        <tr>
        <th class="vt_auteur"><strong>Auteurs</strong></th>
        <th class="vt_mess"><strong>Messages</strong></th>
        </tr>
        <?php
        while ($data = $query->fetch())
        {
		 //On commence à afficher le pseudo du créateur du message :
         //On vérifie les droits du membre
         //(partie du code commentée plus tard)
         echo'<tr><td><strong>
         <a href="profil.php?m='.$data['membre_id'].'&amp;action=consulter">
         '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</a></strong></td>';

         /* Si on est l'auteur du message, on affiche des liens pour
         Modérer celui-ci.
         Les modérateurs pourront aussi le faire, il faudra donc revenir sur
         ce code un peu plus tard ! */

         if ($id == $data['post_createur'])
         {
         echo'<td id=p_'.$data['post_id'].'>Posté à '.date('H\hi \l\e d M y',$data['post_time']).'
         <a href="../vue/forum/poster.php?p='.$data['post_id'].'&amp;action=delete">
         <img src="../images/supprimer.gif" alt="Supprimer"
         title="Supprimer ce message" /></a>
         <a href="../vue/forum/poster.php?p='.$data['post_id'].'&amp;action=edit">
         <img src="../images/Editer.gif" alt="Editer"
         title="Editer ce message" /></a></td></tr>';
         }
         else
         {
         echo'<td>
         Posté à '.date('H\hi \l\e d M y',$data['post_time']).'
         </td></tr>';
         }

         //Détails sur le membre qui a posté
         $data['membre_avatar']='default.jpg';
         echo'<tr><td>
         <img src="../vue/membre/photodeprofil/'.$data['membre_avatar'].'" alt="" />
         <br />Membre inscrit le '.$data['membre_inscrit'].'
         <br />Messages : '.$data['membre_post'].'<br />
         Localisation : '.stripslashes(htmlspecialchars($data['membre_localisation'])).'</td>';

         //Message
         echo'<td>'.code(nl2br(stripslashes(htmlspecialchars($data['post_texte'])))).'
         <br /><hr />'.code(nl2br(stripslashes(htmlspecialchars($data['membre_signature'])))).'</td></tr>';
         } //Fin de la boucle ! \o/
         $query->CloseCursor();
         ?>

		</table>
<?php
        echo '<p>Page : ';
        for ($i = 1 ; $i <= $nombreDePages ; $i++)
        {
                if ($i == $page) //On affiche pas la page actuelle en lien
                {
                echo $i;
                }
                else
                {
                echo '<a href="../controleur/voirtopic.php?t='.$topic.'&amp;page='.$i.'">
                ' . $i . '</a> ';
                }
        }
        echo'</p>';

        //On ajoute 1 au nombre de visites de ce topic
        $query=$bdd->prepare('UPDATE forum_topic
        SET topic_vu = topic_vu + 1 WHERE topic_id = :topic');
        $query->bindValue(':topic',$topic,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();

} //Fin du if qui vérifiait si le topic contenait au moins un message
?>
<?php
include('../bas.php');
?>
</div>
</body>
</html>
