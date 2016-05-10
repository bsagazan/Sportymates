<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Sportymates</title>
		<link rel="stylesheet" href="pageAide.css"/>
		<link rel="icon" type="image/ico" href=images/logo3.png />
	</head>

	<body>

	<header>

	<?php include ("haut.php.php"); ?>

	</header>

		<section id=recherche>
			<p id=question>En quoi pouvons-nous vous aidez ?</p>
			<input type='text' id='barre' name='barre' placeholder="Tapez ici les mots-clés de votre requête." size="30" maxlength="50" />
		</section>

	<section id=rubriques>

		<div class=ligne1>

		<div class=compte>
			<a href="compte">
			<h2>Compte</h2>
			<p>Vous trouverez ici de l'aide sur la gestion de votre compte ou sur des problèmes liés à celui-ci.</p>
			<a/>
		</div>

		<div class=groupe>
			<a href="groupe">
			<h2>Groupe</h2>
			<p>Vous obtiendrez ici de l'aide sur la création et la gestion des groupes.</p>
			</a>
		</div>

		<div class=evenement>
			<a href="evenement">
			<h2>Evènement</h2>
			<p>De l'aide sur la création et sur la gestion d'évènement est disponible ici.</p>
			</a>
		</div>

		</div>

		<div class=ligne2>

		<div class=forum>
			<a href="forum">
			<h2>Forum</h2>
			<p>Vous trouverez ici de l'aide sur les foncionnalités du forum.</p>
			</a>
		</div>

		<div class=sport>
			<a href="sport">
			<h2>Sport</h2>
			<p>Si vous avez des questions concernant les sports proposez votre réponse est surement dans cette section.</p>
			</a>
		</div>

		<div class=club>
			<a href="club">
			<h2>Club</h2>
			<p>Vous pouvez trouver dans cette rubrique de l'aide concernant les clubs.</p>
			</a>
		</div>

		</div>

    </body>

    <footer>
    	
    	<?php include ("bas.php"); ?>

    </footer>

</html>