<?php
if(isset($_POST['Envoyer']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
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
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQsAAAC8CAMAAABYM3sZAAAAM1BMVEX+/v4AAAD09PRcXFz7+/v5+fnz8/OysrI4ODilpaUFBQWpqanIyMhiYmJXV1ddXV2CgoL+u7jbAAAAsElEQVR4nO3Wyw6DIBAFUIujfdv+/9cWXTTKusk04Rwlkd3lRsFhAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPi1iMiOkCe2ezfvuIxm7etkSoqSrjRLj3qVLs1zmdoXI4b3MvbntSzj83Gsojp1666Lr0MXWx3ZiXLc6rgemlh30kt2rDTn5hvp9khdzbvnqFWUtCSpuv61AgAAAAAAAAAAAAAAAAAAAAAAAAAAAACA//cBeJgJ5Ijx+0MAAAAASUVORK5CYII="/>
				</div>
			</body>
		</html>
		';

		mail("sportymates.isep@gmail.com", "CONTACT", $message, $header);
		echo "Votre message a bien été envoyé ! <a href='http://localhost/Sportymates/vue/nouscontacter.php'>Retour à la page nous contacter!!</a>";
	}
	else
	{
	echo "Tous les champs doivent être complétés !<a href='http://localhost/Sportymates/vue/nouscontacter.php'>Retour à la page nous contacter!!</a>";
	}
}
?>
