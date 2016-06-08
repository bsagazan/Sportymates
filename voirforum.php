<?php
session_start();
$titre="Voir un forum";
include("../modele/connect.php");
include("../modele/debut.php");
include("../modele/menu.php");
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
//On récupère la valeur de f
$forum = (int) $_GET['f'];

//A partir d'ici, on va compter le nombre de messages
//pour n'afficher que les 25 premiers
$query=$bdd->prepare('SELECT forum_name, forum_topic, auth_view, auth_topic FROM forum_forum WHERE forum_id = :forum');
$query->bindValue(':forum',$forum,PDO::PARAM_INT);
$query->execute();
$data=$query->fetch();

$totalDesMessages = $data['forum_topic'] + 1;
$nombreDeMessagesParPage = 25;
$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);
?>

<section id="titreforum">
<br/>
<?php
echo '<p><i>Vous êtes ici</i> : <a href="../vue/forum/index.php">Index du forum</a> -->
<a href="voirforum.php?f='.$forum.'">'.stripslashes(htmlspecialchars($data['forum_name'])).'</a>';


//Nombre de pages


$page = (isset($_GET['page']))?intval($_GET['page']):1;

//On affiche les pages 1-2-3, etc.

echo '<p>Page : ';
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
    if ($i == $page) //On ne met pas de lien sur la page actuelle
    {
    echo $i;
    }
    else
    {
    echo '
    <a href="voirforum.php?f='.$forum.'&amp;page='.$i.'">'.$i.'</a>';
    }
}
echo '</p>';


$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;

//Le titre du forum
echo '<h1 id="forum">'.stripslashes(htmlspecialchars($data['forum_name'])).'</h1>';
?>
</section>
</br>
<?php
//Et le bouton pour poster

echo'<a href="../vue/forum/poster.php?action=nouveautopic&amp;f='.$forum.'">
<img src="../images/Nouveau.gif" alt="Nouveau topic" title="Poster un nouveau topic" /></a>';
$query->CloseCursor();
?>
<br/>
<?php


$query=$bdd->prepare('SELECT forum_topic.topic_id, topic_titre, topic_createur, topic_vu, topic_post, topic_time, topic_last_post,
Mb.membre_pseudo AS membre_pseudo_createur, post_createur, post_time, Ma.membre_pseudo AS membre_pseudo_last_posteur, post_id FROM forum_topic
LEFT JOIN forum_membres Mb ON Mb.membre_id = forum_topic.topic_createur
LEFT JOIN forum_post ON forum_topic.topic_last_post = forum_post.post_id
LEFT JOIN forum_membres Ma ON Ma.membre_id = forum_post.post_createur
WHERE topic_genre = "Annonce" AND forum_topic.forum_id = :forum
ORDER BY topic_last_post DESC');
$query->bindValue(':forum',$forum,PDO::PARAM_INT);
$query->execute();
?>
<?php
//On lance notre tableau seulement s'il y a des requêtes !
if ($query->rowCount()>=0)
{
        ?>
        <table>
        <tr>
        <th><img src="../images/annonce.gif" alt="Annonce" /></th>
        <th class="titre"><strong>Titre</strong></th>
        <th class="nombremessages"><strong>Réponses</strong></th>
        <th class="nombrevu"><strong>Vus</strong></th>
        <th class="auteur"><strong>Auteur</strong></th>
        <th class="derniermessage"><strong>Dernier message</strong></th>
        </tr>

        <?php
        //On commence la boucle
        while ($data=$query->fetch())
        {
                //Pour chaque topic :
                //Si le topic est une annonce on l'affiche en haut
                //mega echo de bourrain pour tout remplir

                echo'<tr><td><img src="../images/annonce.gif" alt="Annonce" /></td>

                <td id="titre"><strong>Annonce : </strong>
                <strong><a href="voirtopic.php?t='.$data['topic_id'].'"
                title="Topic commencé à
                '.date('H\hi \l\e d M,y',$data['topic_time']).'">
                '.stripslashes(htmlspecialchars($data['topic_titre'])).'</a></strong></td>

                <td class="nombremessages">'.$data['topic_post'].'</td>

                <td class="nombrevu">'.$data['topic_vu'].'</td>

                <td><a href="profil.php?m='.$data['topic_createur'].'
                &amp;action=consulter">
                '.stripslashes(htmlspecialchars($data['membre_pseudo_createur'])).'</a></td>';

               	//Selection dernier message
		$nombreDeMessagesParPage = 15;
		$nbr_post = $data['topic_post'] +1;
		$page = ceil($nbr_post / $nombreDeMessagesParPage);

                echo '<td class="derniermessage">Par
                <a href="profil.php?m='.$data['post_createur'].'
                &amp;action=consulter">
                '.stripslashes(htmlspecialchars($data['membre_pseudo_last_posteur'])).'</a><br />
                A <a href="voirtopic.php?t='.$data['topic_id'].'&amp;page='.$page.'#p_'.$data['post_id'].'">'.date('H\hi \l\e d M y',$data['post_time']).'</a></td></tr>';
        }
        ?>
        </table>
        <?php
}
$query->CloseCursor();
?>
<?php
//On prend tout ce qu'on a sur les topics normaux du forum


$query=$bdd->prepare('SELECT forum_topic.topic_id, topic_titre, topic_createur, topic_vu, topic_post, topic_time, topic_last_post,
Mb.membre_pseudo AS membre_pseudo_createur, post_id, post_createur, post_time, Ma.membre_pseudo AS membre_pseudo_last_posteur FROM forum_topic
LEFT JOIN forum_membres Mb ON Mb.membre_id = forum_topic.topic_createur
LEFT JOIN forum_post ON forum_topic.topic_last_post = forum_post.post_id
LEFT JOIN forum_membres Ma ON Ma.membre_id = forum_post.post_createur
WHERE topic_genre = "Annonce" AND forum_topic.forum_id = :forum
ORDER BY topic_last_post DESC
LIMIT :premier ,:nombre');
$query->bindValue(':forum',$forum,PDO::PARAM_INT);
$query->bindValue(':premier',(int) $premierMessageAafficher,PDO::PARAM_INT);
$query->bindValue(':nombre',(int) $nombreDeMessagesParPage,PDO::PARAM_INT);
$query->execute();

if ($query->rowCount()>0)
{
?>
        <table>
        <tr>
        <th><img src="../images/messages.gif" alt="Message" /></th>
        <th class="titre"><strong>Titre</strong></th>
        <th class="nombremessages"><strong>Réponses</strong></th>
        <th class="nombrevu"><strong>Vus</strong></th>
        <th class="auteur"><strong>Auteur</strong></th>
        <th class="derniermessage"><strong>Dernier message  </strong></th>
        </tr>
        <?php
        //On lance la boucle

        while ($data = $query->fetch())
        {

                echo'<tr><td><img src="../images/messages.gif" alt="Message" /></td>

                <td class="titre">
                <strong><a href="voirtopic.php?t='.$data['topic_id'].'"
                title="Topic commencé à
                '.date('H\hi \l\e d M,y',$data['topic_time']).'">
                '.stripslashes(htmlspecialchars($data['topic_titre'])).'</a></strong></td>

                <td class="nombremessages">'.$data['topic_post'].'</td>

                <td class="nombrevu">'.$data['topic_vu'].'</td>

                <td><a href="profil.php?m='.$data['topic_createur'].'
                &amp;action=consulter">
                '.stripslashes(htmlspecialchars($data['membre_pseudo_createur'])).'</a></td>';

               	//Selection dernier message
		$nombreDeMessagesParPage = 15;
		$nbr_post = $data['topic_post'] +1;
		$page = ceil($nbr_post / $nombreDeMessagesParPage);

                echo '<td class="derniermessage">Par
                <a href="profil.php?m='.$data['post_createur'].'
                &amp;action=consulter">
                '.stripslashes(htmlspecialchars($data['membre_pseudo_last_posteur'])).'</a><br />
                A <a href="voirtopic.php?t='.$data['topic_id'].'&amp;page='.$page.'#p_'.$data['post_id'].'">'.date('H\hi \l\e d M y',$data['post_time']).'</a></td></tr>';

        }
        ?>
        </table>
        <?php
}
else //S'il n'y a pas de message
{
        echo'<p>Ce forum ne contient aucun sujet actuellement</p>';
}
$query->CloseCursor();
?>
</div>
</body></html>
