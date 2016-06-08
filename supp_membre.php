
<?php
 require_once("../modele/connect.php");

	$id=$_GET['id'];

	$reponse = $bdd->prepare('DELETE FROM membres WHERE id =?');
	$reponse->execute(array($id));
  $reponse1 = $bdd->prepare('DELETE FROM forum_membres WHERE id =?');
  $reponse1->execute(array($id));

	header('Location: http://localhost/Sportymates/vue/membre/Back_Membre.php');
?>
