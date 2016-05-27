<?php
	session_start();
	var_dump($_GET["identifiant"]);
	$idGroupe = $_GET["identifiant"];

	try
		{
    	$bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8', 'Vincent', '');
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

	catch (Exception $e)
		{
        die('Erreur : ' . $e->getMessage());
		}

		$bdd->exec("DELETE FROM groupeinscrit WHERE nomUtilisateur = '$_SESSION["pseudo"]' AND nomGroupe = '$idGroupe')");
?>

<?php
	header("Location: pageGroupe?identifiant=$idGroupe");
	exit;
?>