<?php
require_once("../modele/connect.php");

if(isset($_POST['Inscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
	 $nom = htmlspecialchars($_POST['nom']);
	 $prenom = htmlspecialchars($_POST['prenom']);
	 $pays = htmlspecialchars($_POST['pays']);
	 $codepostal = htmlspecialchars($_POST['codepostal']);
	 $sexe = htmlspecialchars($_POST['sexe']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])) {
      $pseudolength = strlen($pseudo);
			$nomlength = strlen($nom);
			$prenomlength = strlen($prenom);
			if($pseudolength <= 30) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
										if($nomlength <= 30) {
											if($prenomlength <= 25) {
												if (preg_match(" #^[0-9]{5,5}$# ", $codepostal)){
                          $longueurKey = 15;
                          $key = "";
                           for($i=1;$i<$longueurKey;$i++) {
                            $key .= mt_rand(0,9);
                            }
        		             $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse,nom,prenom,pays,codepostal,sexe,confirmkey) VALUES(?, ?, ?, ?, ?,?,?,?,?)");
		                     $insertmbr->execute(array($pseudo, $mail, $mdp, $nom, $prenom,$pays,$codepostal,$sexe,$key));
                          $header="MIME-Version: 1.0\r\n";
                          $header.='From:"sportymates"<support@sportymates.com>'."\n";
                          $header.='Content-Type:text/html; charset="uft-8"'."\n";
                          $header.='Content-Transfer-Encoding: 8bit';
                          $message='
                          <html>
                             <body>
                                <div align="center">
                                   <a href="http://localhost/Sportymates1/controleur/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmez votre compte !</a>
                                </div>
                             </body>
                          </html>
                          ';
                          mail($mail, "Confirmation de compte", $message, $header);
		                     echo "Votre compte a bien ete cree !";
		                     header('Location: http://localhost/Sportymates1/vue/accueilv2.php');
		                      exit();
												} else {
													 echo "Votre code postal n'est pas valide!!<a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
												}
												} else {
													 echo "Votre prenom est trop grand!! Veuillez recommencer!! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
												}
										} else {
											 echo "Votre nom est trop grand!! Veuillez recommencer!! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
										}
                  } else {
                     echo "Vos mots de passes ne correspondent pas ! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
                  }
               } else {
                  echo "Adresse mail déjà utilisée ! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
               }
            } else {
              echo "Votre adresse mail n'est pas valide ! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
            }
         } else {
             echo "Vos adresses mail ne correspondent pas ! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
         }
      } else {
           echo "Votre pseudo ne doit pas dépasser 30 caractères! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
      }
   } else {
      echo "Tous les champs doivent être complétés ! <a href='http://localhost/Sportymates1/vue/formulaireinscriptiontest.php'>Retour à la page inscription!!</a>";
   }
}
?>
