<?php session_start(); ?>
<?php 
include "Connections/conecta.php"; 
$login_postar = $_POST['email'];
$senha_postar = sha1($_POST['senha']);
mysql_select_db($database_conecta, $conecta);
$query_logar = "SELECT * FROM cadastro_user WHERE email='$login_postar' AND senha='$senha_postar'";
$logar = mysql_query($query_logar, $conecta) or die(mysql_error());
$totalrow_logar = mysql_num_rows($logar);
if ($totalrow_logar == 1){
     $_SESSION['login_session'] = $login_postar;
	 $_SESSION['senha_session'] = $senha_postar;
	//include "perfil.php";
	header('Location: PainelAdmAuto.php');
}else{
	unset($_SESSION['login_session']);
	unset($_SESSION['senha_session']);
   // include "login.php?erro=1";
	header('Location: Login.php?erro=1');
}
?>