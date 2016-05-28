<?php
if(isset($_POST['mailform'])){

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
			Ceci est un test!
			<br />
		</div>
	</body>
</html>
';

mail("mettre son adresse", "Salut tout le monde !", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>
