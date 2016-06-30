<?php 
	session_start();
	unset($_SESSION['login_session']);
	unset($_SESSION['senha_session']);
	header("Location: Login.php?sucesso_alterar_login=1");
?>