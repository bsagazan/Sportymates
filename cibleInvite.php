<?php
session_start();
$auteur = $_POST['auteur'];
$groupe = $_POST['groupe'];
$invite = $_POST['invite'];
$auteur = $_GET["auteur"];
var_dump($_POST['invite']);
var_dump($_POST['groupe']);
var_dump($_POST['auteur']);

require_once("../modele/connect.php");

$reponse = $bdd->query("SELECT * FROM membres WHERE pseudo = $invite");

if(!empty($reponse)){
	while($donnees = $reponse->fetch()){
		$desti = $donnees["mail"];

		var_dump($donnees["mail"]);

		$header="MIME-Version: 1.0\r\n";
		$header.='From:"SPORTYMATES"<support@sportymates.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

	$message='
		<html>
			<body>
				<div align="center">
					<img src="http://www.sortir43.com/sites/default/files/styles/bani_re/public/Sports.jpg?itok=oGa6iDWF"/>
					<br />
					L\'utilisateur'.$auteur.'vous a invité à rejoindre le groupe.'$groupe'. Cliquez <a href= "http://localhost/Sportymates1/pageGroupe.php?identifiant='$groupe.'"> ici </a> pour accéder à la page du groupe et le rejoindre !
					<br />
				</div>
			</body>
		</html>
		';

	mail($desti, "Invitation à rejoindre un groupe", $message, $header);
}
}
header("Location: pageGroupe.php?identifiant=$groupe");
exit;

?>
