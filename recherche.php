<?php
require_once('../modele/connect.php');
require('../modele/recherche.php');

$div_groupe=0;
$div_club=0;
$div_sport=0;
$res_groupe=0;
$res_club=0;
$res_sport=0;
$div_aide=0;
$res_aide=0;

if(isset($_GET['theme']) && $_GET['theme'] != NULL){
    if ($_GET['theme']=='groupe'){
        if (isset($_POST['champ']) && $_POST['champ'] != NULL){
            $search = isset($_POST['champ']) ? $_POST['champ'] : NULL ;
            $msgResultat="Vous avez effectué une recherche <strong> Groupes </strong> pour <strong>".$_POST["champ"]."</strong>.<br>";
            $nb_resultat = $nb_simple_groupe;
            if($nb_resultat !=0){
                $div_groupe = 1;
                $res_groupe = 1;
                $rep_groupe=$rep_simple_groupe;
                if ($nb_simple_groupe == 1){
                    $msgResultat.=" Nous avons trouvé ".$nb_resultat." résultat. </p>";
                }
                else{
                    $msgResultat.= " Nous avons trouvé ".$nb_resultat." résultats. </p>";
                }

            }
            else{
                $msgResultat.= " Désolé, aucun résultat n'a été trouvé.";
            }

        }

        elseif (($_POST['nomGroupe'] != NULL) ||
            ($_POST['ville'] != NULL) ||
          //  ($_POST['note'] != "indifferent") ||
            ($_POST['niveau'] != "indifferent") ||
            ($_POST['nomSport'] != "indifferent") ||
            ($_POST['nomClub'] != "indifferent")){

            $msgResultat="Vous avez effectué une recherche pour : ";
            foreach ($tab_avancee_groupe as $cle => $element) {
                $msgResultat.=$cle." = <strong>\"".$element."\"</strong> | ";}

            $nb_resultat = $nb_avancee_groupe;
            if($nb_resultat !=0){
                if ($nb_resultat == 1){
                    $msgResultat.="<br>Nous avons trouvé ".$nb_resultat." résultat. </p>";
                }
                else{
                    $msgResultat.= "<br>Nous avons trouvé ".$nb_resultat." résultats. </p>";
                }
                $div_groupe = 1;
                $res_groupe = 1;
                $rep_groupe=$rep_avancee_groupe;

            }
            else{
                $msgResultat.= "<br>Désolé, aucun résultat n'a été trouvé.";
            }

        }
        else{
            $msgResultat = "Vous n'avez rien saisis, veuillez réessayer.";
        }
    }


    elseif ($_GET['theme']=='club'){
        if (isset($_POST['champ']) && $_POST['champ'] != NULL){
            $search = ($_POST['champ']);
            $msgResultat="Vous avez effectué une recherche <strong> Clubs </strong> pour <strong>".$_POST["champ"]."</strong>.<br>";
            $nb_resultat=$nb_simple_club;
            if($nb_resultat !=0){
                $div_club = 1;
                $res_club = 1;
                $rep_club=$rep_simple_club;
                if ($nb_simple_club == 1){
                    $msgResultat.=" Nous avons trouvé ".$nb_resultat." résultat. </p>";
                }
                else{
                    $msgResultat.= " Nous avons trouvé ".$nb_resultat." résultats. </p>";
                }

            }
            else{
                $msgResultat.= " Désolé, aucun résultat n'a été trouvé.";
            }

        }
    }

    elseif ($_GET['theme']=='sport'){
        if (isset($_POST['champ']) && $_POST['champ'] != NULL){
            $search = ($_POST['champ']);
            $msgResultat="Vous avez effectué une recherche <strong> Sports </strong> pour <strong>".$_POST["champ"]."</strong>.<br>";
            $nb_resultat=$nb_simple_sport;
            if($nb_resultat !=0){
                $div_sport = 1;
                $res_sport = 1;
                $rep_sport=$rep_simple_sport;
                if ($nb_simple_sport == 1){
                    $msgResultat.=" Nous avons trouvé ".$nb_resultat." résultat. </p>";
                }
                else{
                    $msgResultat.= " Nous avons trouvé ".$nb_resultat." résultats. </p>";
                }

            }
            else{
                $msgResultat.= " Désolé, aucun résultat n'a été trouvé.";
            }

        }

    }
    elseif ($_GET['theme']=='aide'){
        if (isset($_POST['champ']) && $_POST['champ'] != NULL){
            $search = ($_POST['champ']);
            $msgResultat="Vous avez effectué une recherche <strong> Aide </strong> pour <strong>".$_POST["champ"]."</strong>.<br>";
            $nb_resultat=$nb_simple_aide;
            if($nb_resultat !=0){
                $div_aide = 1;
                $res_aide = 1;
                $rep_aide=$rep_simple_aide;
                if ($nb_simple_aide == 1){
                    $msgResultat.=" Nous avons trouvé ".$nb_resultat." résultat. </p>";
                }
                else{
                    $msgResultat.= " Nous avons trouvé ".$nb_resultat." résultats. </p>";
                }

            }
            else{
                $msgResultat.= " Désolé, aucun résultat n'a été trouvé.";
            }
        }
    }

    else{
        header("Location: test.php");
    }
}
else{
    if (isset($_POST['champ']) && $_POST['champ'] != NULL){
        $search = ($_POST['champ']);
        $msgResultat="Vous avez effectué une recherche pour <strong>".$_POST["champ"]."</strong>.<br>";
        if($nbreTotal_simple != 0){
            $div_groupe=1;
            $div_sport=1;
            $div_club=1;
            if ($nbreTotal_simple == 1){
                $msgResultat.="Nous avons trouvé ".$nbreTotal_simple ." résultat. </p>";
                if ($nb_simple_groupe==1) {$res_groupe=1; $rep_groupe=$rep_simple_groupe;}
                if ($nb_simple_club==1) {$res_club=1; $rep_club=$rep_simple_club;}
                if($nb_simple_sport==1){$res_sport=1; $rep_sport = $rep_simple_sport;}
            }
            else{
                $msgResultat.= "Nous avons trouvé ".$nbreTotal_simple ." résultats. </p>";
                if ($nb_simple_groupe!=0) {$res_groupe=1;$rep_groupe=$rep_simple_groupe;}
                if ($nb_simple_club!=0) {$res_club=1; $rep_club=$rep_simple_club;}
                if($nb_simple_sport!=0){$res_sport=1; $rep_sport = $rep_simple_sport;}
            }

        }
        else{
            $msgResultat.= "<br>Désolé, aucun résultat n'a été trouvé.";
        }
    }
    else{
        $msgResultat="Vous n'avez rien saisis, veuillez réessayer.";
    }

}
include("../vue/recherche.php");

?>
