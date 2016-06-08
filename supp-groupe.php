
<?php
require_once("../modele/connect.php");

	$groupe = $_GET['groupe'];

	if (isset($groupe)){
	$reponse = $bdd->query('DELETE FROM groupe WHERE nomGroupe ="'.$groupe.'"');
	$reponse1 = $bdd->query('DELETE FROM groupeinscrit WHERE nomGroupe ="'.$groupe.'"');
	$reponse2 = $bdd->query('DELETE FROM commentaire WHERE nomGroupe ="'.$groupe.'"');
	$reponse3 = $bdd->query('DELETE FROM notergroupe WHERE nomGroupe ="'.$groupe.'"');

	header('Location: http://localhost/Sportymates/vue/groupe/groupe.php');
	 }
?>
