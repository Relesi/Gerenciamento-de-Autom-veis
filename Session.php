<?php
// Start Sessão e Proteção Restrição
session_start();
if(!isset($_SESSION['login_session']) AND !isset($_SESSION['senha_session'])){
	unset($_SESSION['login_session']);
	unset($_SESSION['senha_session']);
	$_SESSION['login_session'] = array();	
	session_regenerate_id();
	$_SESSION['senha_session'] = array();	
	session_regenerate_id();
	header("location: Sair.php");
	exit;
}
?>
<?php 
// Conexão e Sessão
include "Connections/conecta.php";
$login = $_SESSION['login_session'];
$senha = $_SESSION['senha_session'];

mysql_select_db($database_conecta, $conecta);
$sql_logar_admin_user = "SELECT * FROM cadastro_user WHERE email='$login' AND senha='$senha'";
$query_logar_admin_user = mysql_query($sql_logar_admin_user, $conecta) or die(mysql_error());

while($linha = mysql_fetch_assoc($query_logar_admin_user)){

$id_session_cad = $linha['id'];
$email_session_cad = $linha['email'];
$nome_session_cad = $linha['nome'];
$administrador_session_cad = $linha['administrador'];
// Dados Cadastro
$nome = $linha['nome'];
$apelido = $linha['apelido'];
$cpf = $linha['cpf'];
$nasc = $linha['nasc'];
$end = $linha['end'];
$num = $linha['num'];
$comp = $linha['comp'];
$bairro = $linha['bairro'];
$cidade = $linha['cidade'];
$estado = $linha['estado'];
$pais = $linha['pais'];
$cep = $linha['cep'];
$telefone = $linha['telefone'];
$celular = $linha['celular'];
}
?>