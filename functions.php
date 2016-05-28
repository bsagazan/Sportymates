<!DOCTYPE html>
<!-- Encodage en utf-8, en XHTML -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Encodage en utf-8, en HTML 5 -->
<meta charset="utf-8" />
<?php
function erreur($err='')
{
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   exit('<p>'.$mess.'</p>
   <p>Cliquez <a href="../forum/index.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');
}
?>
<?php
function move_avatar($avatar)
{
    $extension_upload = strtolower(substr(  strrchr($avatar['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "./images/avatars/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($avatar['tmp_name'],$name);
    return $nomavatar;
}
?>
<?php
function verif_auth($auth_necessaire)
{
$level=(isset($_SESSION['level']))?$_SESSION['level']:1;
return ($auth_necessaire <= intval($level));
}
?>
