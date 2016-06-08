
<?php
require_once("../modele/connect.php");

	$club=$_GET['club'];

	if (isset($club)){
		$reponse = $bdd->query('DELETE FROM club WHERE idClub ="'.$club.'"');
		$reponse2 = $bdd->query('DELETE FROM commentaire WHERE idClub ="'.$club.'"');
		$reponse3 = $bdd->query('DELETE FROM noterclub WHERE idClub ="'.$club.'"');

	header('Location: ../vue/club/club.php');
	}
?>
