
<head>
	<meta charset="utf-8" />
	<title>Sportymates</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Page2/inscription.css"/>
</head>

<body>
	<?php
		include 'entete.inc';
	?>


		<div id="bande">
			<p class="Bouton">Mon profil</p>
			<p class="Bouton">Mon groupe</p>
			<p class="Bouton">Mon Club</p>
		</div>
		<div id="Photo">
			<img id="Profil" src="http://localhost/Page2/profil.png" alt="Photo de profil" title=":D"/>
			<h5>Modifier la photo de profil</h5>
		</div>
		<h2>Nouveau membre</h2>
		<div id="formulaire">
			<p>Pseudo</p>
			<p>Nom</p>
			<p>Prénom</p>
			<p>Téléphone</p>
			<p>Date de naissance&nbsp&nbsp</p>
			<p>Pays</p>
			<p>Ville</p>
			<p>Adresse mail</p>
			<p>Mes expériences</p>
		</div>
		<div id="Champs">
			<p><input type="checkbox"></input> Femme <input type="checkbox">Homme</input></p>
			<p><input type="text" style="width: 30em;"></input></p>
			<p><input type="text" style="width: 30em;"></input></p>
			<p><input type="tel" style="width: 10em;"></input></p>
			<p><input type="date" ></input></p>
			<p><input type="text" style="width: 30em;"></input></p>
			<p><input type="text" style="width: 30em;"></input></p>
			<p id="ChoixSport">
				<div>
					<input type="checkbox"></input>Football
					<input type="checkbox"></input>Natation
					<input type="checkbox"></input>Volley
					<input type="checkbox"></input>Danse
					<input type="checkbox"></input>Basket 
				</div>
				<div>
					<input type="checkbox"></input>Badminton
					<input type="checkbox"></input>Tennis
					<input type="checkbox"></input>Handbell
					<input type="checkbox"></input>Golf
					<input type="checkbox"></input>Rugby
				</div>
				<div>
					<input type="checkbox"></input>Escrime
					<input type="checkbox"></input>Autres
					<input type="checkbox"></input>Athlétismme
					<input type="checkbox"></input>Baseball
				</div>
			</p>
			<p><input type="text" style="width: 30em;"></input></p>
			<p><input type="email" style="width: 30em;"></input></p>
			<p><input type="password" minlength="5" style="width: 30em;"></input>*Minimum 5 caractères</p>
			<p><input type="password" minlength="5" style="width: 30em;"></input></p>
		</div>
		<div id="FinFormulaire">
			<p>Mes groupes <input></input>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMes sports <input></input></p>
			<p><input type="checkbox"></input> J'accepte de recevoir les offres promotionnelles des partenaires sportymates</p>
			<p><input type="checkbox"></input> J'ai lu et j'accepte les conditions générales d'utilisation</p>
		</div>
		<div id="BoutonFin">
			<input type="button" name="lien1" value="Inscription" onclick="self.location.href='lien.html'" style="background-color:#EEEEEE" style="color:white; font-weight:bold; font-size:3em; font-family: Verdana"onclick title="Enregistrer"> 
			<p></p>
		</div>
		<?php
			include ('footer.inc');
		?>
</body>
