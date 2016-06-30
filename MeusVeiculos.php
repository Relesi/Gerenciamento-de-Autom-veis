<?php require_once('Session.php'); ?>
<?php
// Página de conexão com o banco de dados MYSQL
include "Connections/conecta.php";	
if($_POST['btn_incluir']){ // POST - inicio
// Dados user
$incluirIdUser = $id_session_cad;
// Informações Veículo
$incluirPlaca = $_POST['placa'];
$incluirRenavam = $_POST['renavam'];
$incluirMarca = $_POST['marca'];
$incluirModelo = $_POST['modelo'];
$incluirCor = $_POST['cor'];
$incluirCombustivel = $_POST['combustivel'];
$incluirAnoFab = $_POST['ano_fab'];
$incluirAnoMod = $_POST['ano_mod'];
// data de cadastro
$incluir_date = date('Y/m/d');
$incluir_time = date('H:i:s');

// Cadastro Repetido PLACA - inicio
mysql_select_db($database_conecta, $conecta);
$placa_repetido = strip_tags(trim($_POST['placa']));
$re_repetido = mysql_query("select count(*) as total from cadastro_veiculo where placa='$placa_repetido'");
$total_placa_repetido = mysql_result($re_repetido, 0, "total");
// Cadastro Repetido E-MAIL - fim

// Inserir no banco de dados
if($incluirPlaca and $total_placa_repetido == 0){  // if triagem - inicio
mysql_select_db($database_conecta, $conecta);
$sql_incluir_cad = mysql_query("INSERT INTO cadastro_veiculo (
	id_user,
	placa,
	renavam,
	marca,
	modelo,
	cor,
	combustivel,
	ano_fab,
	ano_mod,
	date,
	time
) VALUES (
	'$incluirIdUser',
	'$incluirPlaca',
	'$incluirRenavam',
	'$incluirMarca',
	'$incluirModelo',
	'$incluirCor',
	'$incluirCombustivel',
	'$incluirAnoFab',
	'$incluirAnoMod',
	'$incluir_date',
	'$incluir_time'
)");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_incluir_cad){ // sucesso cadastro - inicio
header('Location: MeusVeiculos.php?sucesso_cad=1');
} // sucesso cadastro - fim
}  // POST - fim
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>.:: AdmAuto ::.</title>
<link rel="stylesheet" href="css/estilo.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/animatedcollapse.js"></script>
<script type="text/javascript"> 
// efeito revelar esconder div - inicio
// requer jquery.min.js , animatedcollapse.js
animatedcollapse.addDiv('texto_1', 'fade=0,speed=400,group=textos')
animatedcollapse.addDiv('texto_2', 'fade=0,speed=400,group=textos,persist=1,hide=1')
animatedcollapse.addDiv('texto_3', 'fade=0,speed=400,group=textos,hide=1')
animatedcollapse.addDiv('texto_4', 'fade=0,speed=400,group=textos,hide=1')
animatedcollapse.ontoggle=function($, divobj, state){
}
animatedcollapse.init()
// efeito revelar esconder div - fim
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Meus Veículos</span>
</div>
<div id="div_conteudo_ajuste">
<div id="div_perfil">
Nome: <strong><?php echo $nome_session_cad; ?></strong><br>
E-mail: <strong><?php echo $email_session_cad; ?></strong><br>
Status: <strong><?php 
if($administrador_session_cad == 1){
echo "Administrador"; 
}else{
echo "Usuário";
}
?></strong><br>
</div>

<?php if($_GET['sucesso_cad'] == 1) { // div sucesso cadastro - inicio ?>
<div id="div_sucesso">
<?php  
   	echo "Sucesso!";
	echo "<br>";
	echo "Veículo incluido no sistema.";
?>
</div>
<?php } // div sucesso cadastro - fim ?>
<?php if($if_div_erro == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php
	if(!$incluirEmail){
		echo "Atenção! O campo *Placa* é obrigatório.";
		echo "<br>";
		}
		if($total_placa_repetido > 0){
		echo "Atenção! Placa já cadastrada no sistema.";
		echo "<br>";
		}
?>
</div>
<?php } // div erro - fim ?>

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_1]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Cadastrar Veículos:</a></li>
</ul>
<div id="texto_1" style="width:auto; background:#FFF9DD; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<form action="MeusVeiculos.php" method="post" id="cadastro_veiculo">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">Placa:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="placa" id="placa" value="<?php echo "$incluirPlaca"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Renavam:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="renavam" id="renavam" value="<?php echo "$incluirRenavam"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Marca:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="marca" id="marca" value="<?php echo "$incluirMarca"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Modelo:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="modelo" id="modelo" value="<?php echo "$incluirModelo"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Cor:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cor" id="cor" value="<?php echo "$incluirCor"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Combustível:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="combustivel" id="combustivel" value="<?php echo "$incluirCombustivel"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Ano Fab.:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="ano_fab" id="ano_fab" value="<?php echo "$incluirAnoFab"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Ano Mod.:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="ano_mod" id="ano_mod" value="<?php echo "$incluirAnoMod"; ?>"></td>
  </tr>
</table>
<div id="div_centralizar">
<input name="btn_incluir" type="submit" class="btn_editar" id="btn_incluir" value="Incluir Veículo" />
</div>
</form>
</h4>
</div>

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_2]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Editar Meus Veiculos:</a></li>
</ul>
<div id="texto_2" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">

<?php
mysql_select_db($database_conecta, $conecta);
$sql_listar_veiculo = mysql_query("SELECT * FROM cadastro_veiculo WHERE id_user='$id_session_cad' ORDER BY id DESC");
$total_listar_veiculo = mysql_num_rows($sql_listar_veiculo);
while($linha_listar_veiculo = mysql_fetch_array($sql_listar_veiculo)){ // listar veiculos - inicio
?>
<div id="div_listar">
<?php if($linha_listar_veiculo['imagem']) { // imagem ?>                    
<img src="imagens_veiculos/<?php echo $linha_listar_veiculo['imagem']; ?>"alt="" width="237" height="175" border="0" />
<?php }else{ // imagem ?>
<img src="imagens/imagem_padrao2.png" width="237" height="175" border="0" />
<?php } // imagem ?>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle" class="fonte_14_r">Placa:</td>
    <td width="81%" align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['placa']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Renavam:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['renavam']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Marca:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['marca']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Modelo:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['modelo']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Cor:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['cor']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Combustível:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['combustivel']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Ano Fab.:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['ano_fab']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Ano Mod.:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['ano_mod']; ?></td>
  </tr>
</table>
<div id="div_centralizar">
<input name="imagem" type="button" class="btn_editar" id="imagem" onClick="MM_goToURL('parent','MeusVeiculosImagem.php?id=<?php echo $linha_listar_veiculo['id']; ?>');return document.MM_returnValue" value="Imagem" />
<input name="alterar" type="button" class="btn_editar" id="alterar" onClick="MM_goToURL('parent','MeusVeiculosAlterar.php?id_veiculo=<?php echo $linha_listar_veiculo['id']; ?>');return document.MM_returnValue" value="Alterar" />
<input name="manutencao" type="button" class="btn_editar" id="manutencao" onClick="MM_goToURL('parent','MeusVeiculosManutencao.php?id_veiculo=<?php echo $linha_listar_veiculo['id']; ?>');return document.MM_returnValue" value="Manutenção" />
<input name="Excluir" type="button" class="btn_editar" id="Excluir" onClick="MM_goToURL('parent','MeusVeiculosExcluir.php?id_veiculo=<?php echo $linha_listar_veiculo['id']; ?>');return document.MM_returnValue" value="Excluir" />
</div>
</div>
<?php } // // listar veiculos - fim ?>
<?php if($total_listar_veiculo <= 0) { // resultado zero - inicio ?>
<div id="div_resultado_zero">
Nenhum veículo cadastrado.
</div>
<?php } // resultado zero - fim ?>
</div>

</div>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="PainelAdmAuto.php"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li>
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>   
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>
</body>
</html>