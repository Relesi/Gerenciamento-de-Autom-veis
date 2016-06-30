<?php require_once('Session.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>.:: Administração de Veículos ::.</title>
<link rel="stylesheet" href="css/estilo.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
a:link {
	color: #069;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #069;
}
a:hover {
	text-decoration: underline;
	color: #0086C6;
}
a:active {
	text-decoration: none;
	color: #069;
}

</style></head>
<body>
<div id="div_topo">
	<span class="fonte_br_16">Painel  AdmAuto RLS</span></div>
<div id="div_centralizar">
<ul id="menu_3">
  <li><a href="Perfil.php"><img src="imagens/perfil.png" width="100" height="100" border="0"><br>Perfil</a></li>
  <li><a href="MeusVeiculos.php"><img src="imagens/meus_veiculos.png" width="100" height="100" border="0"><br>Meus Veículos</a></li>
  <li><a href="ConsultarVeiculos.php"><img src="imagens/consultar_veiculos.png" width="100" height="100" border="0"><br>Consultar Veículos</a></li>
</ul>  
</div>

<?php if($administrador_session_cad == 1){ // administrador - inicio ?>
<div id="div_administrador">
Nome: <strong><?php echo $nome_session_cad; ?></strong><br>
E-mail: <strong><?php echo $email_session_cad; ?></strong><br>
Status: <strong><?php 
if($administrador_session_cad == 1){
echo "Administrador"; 
}else{
echo "Usuário";
}
?></strong><br><br>



<span class="fonte_azul_19">
<a href="CadastroUser.php">Total de Usuários Cadastrados: <strong><?php
mysql_select_db($database_conecta, $conecta);
$sql_user = mysql_query("SELECT count(*) as total FROM cadastro_user");
$total_user = mysql_result($sql_user, 0, "total");
echo $total_user;
?></strong></a></span><br>

<span class="fonte_azul_19">
<a href="cadastro_veiculo.php">Total de Veículos: <strong><?php
mysql_select_db($database_conecta, $conecta);
$sql_veiculo = mysql_query("SELECT count(*) as total FROM cadastro_veiculo");
$total_veiculo = mysql_result($sql_veiculo, 0, "total");
echo $total_veiculo;
?></strong></a></span><br>

<span class="fonte_azul_19">
<a href="AdmManutencao.php">Total de Manutenções: <strong><?php
mysql_select_db($database_conecta, $conecta);
$sql_manutencao = mysql_query("SELECT count(*) as total FROM cadastro_manutencao");
$total_manutencao = mysql_result($sql_manutencao, 0, "total");
echo $total_manutencao;
?></strong></a></span><br>

<span class="fonte_azul_19">
<a href="AdmAdministradores.php">Total de Administradores: <strong><?php 
mysql_select_db($database_conecta, $conecta);
$sql_administrador = mysql_query("SELECT count(*) as total FROM cadastro_user WHERE administrador='1'");
$total_administrador = mysql_result($sql_administrador, 0, "total");
echo $total_administrador;
?></strong></a></span>

</div>
<?php } // administrador - fim ?>

<ul id="menu">
  <li><a href="Compartilhar.php"><div id="div_seta_dir"><img src="imagens/compartilhar.png" width="60" height="61" border="0"> Compartilhar </div></a></li>
  <li><a href="Manual.html"><div id="div_seta_dir"><img src="imagens/carro.gif" width="60" height="61" border="0"> Como usar o AdmAuto </div></a></li>
</ul>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>        
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>
</body>
</html>