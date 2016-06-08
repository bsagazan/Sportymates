
<?php
require_once("../modele/connect.php");

	$rubrique=$_GET['rubrique'];

	$reponse = $bdd->prepare('DELETE FROM rubrique WHERE idRubrique =?');
	$reponse->execute(array($rubrique));
	header('Location: http://localhost/Sportymates/vue/membre/Back_Aide.php');
?>
