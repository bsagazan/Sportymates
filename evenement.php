<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Sportymates</title>
		<link rel="stylesheet" href="rubrique.css"/>
		<link rel="icon" type="image/ico" href=images/logo3.png />
	</head>

	<body>

		<header>

			<?php include ("haut.php.php"); ?>

		</header>

	<section id=menu>
		<a href="pageAide.php.php">
		<img src="images/Fleche retour.jpg" alt="Fleche retour" class=img>
		</a>
		<p class=espace></p>
		<a href="accueilv2.html">
		<p class=accueil>Retour à l'accueil</p>
		</a>
	</section>

	<section id=recherche>
		<p id=question>En quoi pouvons-nous vous aidez ?</p>
		<input type='text' id='barre' name='barre' placeholder="Tapez ici les mots-clés de votre requête." size="30" maxlength="50" />
	</section>

	<section id=FAQ>
		<?php
			try
				{
    			$bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8', 'Vincent', '');
    			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}

			catch (Exception $e)
				{
        		die('Erreur : ' . $e->getMessage());
				}
		
		$reponse = $bdd->query('SELECT * FROM rubrique WHERE categorie = "evenement"');

		while ($donnees = $reponse->fetch()) {
				?>

				<dl>
					<dt class=questionFAQ><?php echo $donnees["question"]; ?></dt>
					<dd class=reponseFAQ><?php echo $donnees["reponse"]; ?></dd>
				</dl>

			<?php
			}

		$reponse->closeCursor();
		?>

	</section>

		<footer>
			
			<?php include ("bas.php") ?>

		</footer>

	</body>