<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/Sportymates1/style/accueilv2.css" />
        <link rel="stylesheet" href="http://localhost/Sportymates1/style/formulaireinscription.css" />
        <title>Sportymates-Formulaireinscription</title>
        <link rel="icon" type="image/ico" href=logo3.png />
    </head>

    <body>
      <div id='wrapper'>
        <header style="background-image:url(../images/ban.jpg)">
          <?php
          if(empty($_SESSION['pseudo'])){
            include("banniere_entete.php");
            include("nav.php");
          }else{
            include("banniere_entete2.php");
            include("nav.php");
          }
          ?>
        </header>

    <div id="partieinscription">
                <h2>Inscription</h2>
                  <div id="partie2">
                  <form method="POST" action="http://localhost/Sportymates1/controleur/login2.php">
                   <label for="sexe" class="sexe1">Quel est votre sexe?</label>&nbsp&nbsp&nbsp
                    <select name="sexe" id="sexe">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                    <?php
                        if(isset($_POST['sexe'])) echo $_POST['sexe'];
                    ?>
                  </br></br><label for="nom" class="nom1">  * Votre Nom :
                  <input required type="text" class="nom" placeholder="Votre nom" id="nomUtilisateur" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" /><br />
                </br><label for="prenom" class="prenom1">  * Votre Prenom :
                  <input required type="text" class="prenom" placeholder="Votre prenom " id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" /><br />
                  </br><label for="pseudo" class="nomUtilisateur1">  * Votre Pseudo : <input required type="text" class="nomUtilisateur" placeholder="Votre nom utilisateur" id="nomUtilisateur" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br />
                  </br><label for="mail" class="adressemail1">* Adresse Mail :</label>
                  <input required type="email" class="adressemail" placeholder="Votre mail" id="mail" name="mail" maxlength="30" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                </br><label for="mail2" class="adressemail21">* Confirmation adresse e-mail :</label>
                  <input required type="email" class="adressemail2" placeholder="Confirmez votre mail" id="mail" name="mail2" maxlength="30" value="<?php if(isset($mail2)) { echo $mail2; } ?>"  />
                </br><label for="mdp" class="mdp1"> * Mot de passe :</label>
                  <input required type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" class="mdp" />
                </br><label for="mdp2" class="mdp21">* Confirmation du mot de passe :</label>
                  <input required type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" class="mdp2"  /><br />
                </br><label for="pays" class='pays1'>* Pays:</label>
                  <input required type="text" name="pays" id="pays" class="pays"  value="<?php if(isset($pays)) { echo $pays;}?>"/><br />
                </br><label for="codepostal" class='codepostal1'>* Code Postal:</label>
                <input required type="text" name="codepostal" id="codepostal" class="codepostal" maxlength="5" value="<?php if(isset($codepostal)) { echo $codepostal;}?>"/>

           <div id="all">
           <input type="checkbox" name="conditions" class="cond1" required><label class="cond">J'accepte les conditions d'utilisations<br></code></label>
           <p>Tous les champs sont obligatoires</p>
           </div>
           <input type="submit" name="Inscription" value="Inscription"  class="inscription"/>
              </form>
            </div>
          </div>
          <br /><br />
          <?php
          include('bas.php');
          ?>
      </div>
    </body>
</html>
<!--
<label for="datenaissance">  Date de naissance*:  </label>
<select name="datenaissance[]"> <?php for ($k= date('Y') ; $k>1899 ; $k--) {echo '<option value="'.$k.'">'.$k.'</option>';} ?>
</select>
<select name="datenaissance[]"> <?php for ($k=1 ; $k<13 ; $k++) {echo '<option value="'.$k.'">'.$k.'</option>';} ?>
</select>
<select name="datenaissance[]"> <?php for ($k=1 ; $k<32 ; $k++) {echo '<option value="'.$k.'">'.$k.'</option>';} ?></select>--!>
