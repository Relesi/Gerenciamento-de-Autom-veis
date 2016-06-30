<?php require_once('Session.php'); ?>
<?php
// Página de conexão com o banco de dados MYSQL
include "Connections/conecta.php";	
$id_veiculo = $_GET['id_veiculo'];
if($_POST['btn_incluir_manutencao']){ // POST - inicio
// Dados user
$incluirIdUser = $id_session_cad;
// Informações Veículo
$incluirIdVeiculo = $_POST['id_veiculo'];
$incluirTitulo = $_POST['titulo'];
$incluirDescricao = $_POST['descricao'];
$incluirQuemExecutou = $_POST['quem_executou'];
$incluirDataManutencao = $_POST['data_servico'];
// data de cadastro
$incluir_date = date('Y/m/d');
$incluir_time = date('H:i:s');

// Inserir no banco de dados
if($incluirTitulo){  // if triagem - inicio
mysql_select_db($database_conecta, $conecta);
$sql_incluir_cad = mysql_query("INSERT INTO cadastro_manutencao (
	id_user,
	id_veiculo,
	titulo,
	descricao,
	quem_executou,
	data_servico,
	date,
	time
) VALUES (
	'$incluirIdUser',
	'$incluirIdVeiculo',
	'$incluirTitulo',
	'$incluirDescricao',
	'$incluirQuemExecutou',
	'$incluirDataManutencao',
	'$incluir_date',
	'$incluir_time'
)");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_incluir_cad){ // sucesso cadastro - inicio
header("Location: MeusVeiculosManutencao.php?sucesso_cad=1&id_veiculo=$id_veiculo");
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

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Meus Veículos / Manutenção</span>
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
	echo "Manutenção incluida no sistema.";
?>
</div>
<?php } // div sucesso cadastro - fim ?>
<?php if($if_div_erro == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php
	if(!$incluirTitulo){
		echo "Atenção! O campo *Título* é obrigatório.";
		echo "<br>";
		}
?>
</div>
<?php } // div erro - fim ?>

<?php
$id_veiculo = $_GET['id_veiculo'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_veiculo = mysql_query("SELECT * FROM cadastro_veiculo WHERE id='$id_veiculo' AND id_user='$id_session_cad' ORDER BY id DESC");
$total_listar_veiculo = mysql_num_rows($sql_listar_veiculo);
while($linha_listar_veiculo = mysql_fetch_array($sql_listar_veiculo)){ // listar veiculos - inicio
?>
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">Placa:</td>
    <td width="81%" align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['placa']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Renavam:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['renavam']; ?></td>
    </tr>
</table>
</h4>
<?php } // // listar veiculos - fim ?>

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_1]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Cadastrar Manutenção:</a></li>
</ul>
<div id="texto_1" style="width:auto; background:#FFF9DD; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<form action="MeusVeiculosManutencao.php?id_veiculo=<?php echo $_GET['id_veiculo']; ?>" method="post" id="cadastro_veiculo">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">Título do Serviço:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="titulo" id="titulo" value="<?php echo "$incluirTitulo"; ?>">
      <span class="fonte_14_rb">
      <input name="id_veiculo" type="hidden" id="id_veiculo" value="<?php echo $_GET['id_veiculo']; ?>">
      </span></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Descrição do Serviço:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="descricao" id="descricao" value="<?php echo "$incluirDescricao"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Quem executou o Serviço:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="quem_executou" id="quem_executou" value="<?php echo "$incluirQuemExecutou"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Data desta Manutenção:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="data_servico" id="data_servico" value="<?php echo "$incluirDataManutencao"; ?>"></td>
    </tr>
</table>
<div id="div_centralizar">
<input name="btn_incluir_manutencao" type="submit" class="btn_editar" id="btn_incluir_manutencao" value="Incluir Manutenção" />
</div>
</form>
</h4>
</div>

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_2]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Editar Manutenções deste Veículo:</a></li>
</ul>
<div id="texto_2" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">

<?php
$id_veiculo = $_GET['id_veiculo'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_manutencao = mysql_query("SELECT * FROM cadastro_manutencao WHERE id_user='$id_session_cad' AND id_veiculo='$id_veiculo' ORDER BY id DESC");
$total_listar_manutencao = mysql_num_rows($sql_listar_manutencao);
while($linha_listar_manutencao = mysql_fetch_array($sql_listar_manutencao)){ // listar veiculos - inicio
?>
<div id="div_listar">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="top" class="fonte_14_r">Título do Serviço:</td>
    <td width="81%" align="left" valign="top" class="fonte_14_rb"><?php echo $linha_listar_manutencao['titulo']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="top" class="fonte_14_r">Descrição do Serviço:</td>
    <td align="left" valign="top" class="fonte_14_rb"><?php echo $linha_listar_manutencao['descricao']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="top" class="fonte_14_r">Quem executou o Serviço:</td>
    <td align="left" valign="top" class="fonte_14_rb"><?php echo $linha_listar_manutencao['quem_executou']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="top" class="fonte_14_r">Data desta Manutenção:</td>
    <td align="left" valign="top" class="fonte_14_rb"><?php echo $linha_listar_manutencao['data_servico']; ?> </td>
    </tr>
</table>
<div id="div_centralizar">
  <input name="alterar" type="button" class="btn_editar" id="alterar" onClick="MM_goToURL('parent','MeusVeiculosManutencaoAlterar.php?id_veiculo=<?php echo $linha_listar_manutencao['id_veiculo']; ?>&id_manutencao=<?php echo $linha_listar_manutencao['id']; ?>');return document.MM_returnValue" value="Alterar" />
  <input name="Excluir" type="button" class="btn_editar" id="Excluir" onClick="MM_goToURL('parent','MeusVeiculosManutencaoExcluir.php?id_veiculo=<?php echo $linha_listar_manutencao['id_veiculo']; ?>&id_manutencao=<?php echo $linha_listar_manutencao['id']; ?>');return document.MM_returnValue" value="Excluir" />
</div>
</div>
<?php } // // listar veiculos - fim ?>
<?php if($total_listar_manutencao <= 0) { // resultado zero - inicio ?>
<div id="div_resultado_zero">
Nenhuma manutenção cadastrada para este veículo.
</div>
<?php } // resultado zero - fim ?>
</div>

</div>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="MeusVeiculos.php"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li>
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>   
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>
</body>
</html>