<?php require_once('Session.php'); ?>
<?php
// Página de conexão com o banco de dados MYSQL
include "Connections/conecta.php";
$id_veiculo = $_GET['id_veiculo'];
$id_manutencao = $_GET['id_manutencao'];
if($_POST['btn_alterar']){ // POST - inicio
	
// Dados user
$incluirIdUser = $id_session_cad;
// Informações Veículo
$incluirIdManutencao = $_POST['id_manutencao'];
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
$sql_alterar_cad = mysql_query("UPDATE cadastro_manutencao SET
	titulo='$incluirTitulo',
	descricao='$incluirDescricao',
	quem_executou='$incluirQuemExecutou',
	data_servico='$incluirDataManutencao'
WHERE id=$incluirIdManutencao");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_alterar_cad){ // sucesso cadastro - inicio
header("Location: MeusVeiculosManutencaoAlterar.php?sucesso_cad=1&id_veiculo=$id_veiculo&id_manutencao=$id_manutencao");
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

//-->
</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Meus Veículos / Manutenção / Alterar</span>
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
	echo "Informações da manutenção alteradas no sistema.";
?>
</div>
<?php } // div sucesso cadastro - fim ?>
<?php if($if_div_erro == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php
	if(!$incluirEmail){
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

<?php
$id_veiculo = $_GET['id_veiculo'];
$id_manutencao = $_GET['id_manutencao'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_manutencao = mysql_query("SELECT * FROM cadastro_manutencao WHERE id='$id_manutencao' AND id_user='$id_session_cad' AND id_veiculo='$id_veiculo'");
$total_listar_manutencao = mysql_num_rows($sql_listar_manutencao);
while($linha_listar_manutencao = mysql_fetch_array($sql_listar_manutencao)){ // listar veiculos - inicio
?>

<div id="texto_1_off" style="width:auto; background:#FFF9DD; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<form action="MeusVeiculosManutencaoAlterar.php?id_veiculo=<?php echo $linha_listar_manutencao['id_veiculo']; ?>&id_manutencao=<?php echo $linha_listar_manutencao['id']; ?>" method="post" id="alterar_veiculo">
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="19%" align="right" valign="middle">Título do Serviço:</td>
      <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="titulo" id="titulo" value="<?php echo $linha_listar_manutencao['titulo']; ?>">
        <span class="fonte_14_rb">
          <input name="id_manutencao" type="hidden" id="id_manutencao" value="<?php echo $_GET['id_manutencao']; ?>">
        </span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Descrição do Serviço:</td>
      <td align="left" valign="middle"><input type="text" class="input_login" name="descricao" id="descricao" value="<?php echo $linha_listar_manutencao['descricao']; ?>"></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Quem executou o Serviço:</td>
      <td align="left" valign="middle"><input type="text" class="input_login" name="quem_executou" id="quem_executou" value="<?php echo $linha_listar_manutencao['quem_executou']; ?>"></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Data desta Manutenção:</td>
      <td align="left" valign="middle"><input type="text" class="input_login" name="data_servico" id="data_servico" value="<?php echo $linha_listar_manutencao['data_servico']; ?>"></td>
    </tr>
  </table>
  <div id="div_centralizar">
<input name="btn_alterar" type="submit" class="btn_editar" id="btn_alterar" value="Alterar Manutenção" />
</div>
</form>
</h4>
</div>
<?php } // // listar veiculos - fim ?>

</div>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="MeusVeiculosManutencao.php?id_veiculo=<?php echo "$id_veiculo"; ?>"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li>
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>   
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>
</body>
</html>