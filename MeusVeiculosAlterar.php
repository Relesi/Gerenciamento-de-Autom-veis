<?php require_once('Session.php'); ?>
<?php
$id_veiculo = $_GET['id_veiculo'];
if($_POST['btn_alterar']){ // POST - inicio	
// Dados user
$incluirIdUser = $id_session_cad;
// Informações Veículo
$incluirIdVeiculo = $_POST['id_veiculo'];
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

// Inserir no banco de dados
if($incluirPlaca){  // if triagem - inicio
mysql_select_db($database_conecta, $conecta);
$sql_alterar_cad = mysql_query("UPDATE cadastro_veiculo SET
	placa='$incluirPlaca',
	renavam='$incluirRenavam',
	marca='$incluirMarca',
	modelo='$incluirModelo',
	cor='$incluirCor',
	combustivel='$incluirCombustivel',
	ano_fab='$incluirAnoFab',
	ano_mod='$incluirAnoMod'
WHERE id=$incluirIdVeiculo");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_alterar_cad){ // sucesso cadastro - inicio
header("Location: MeusVeiculosAlterar.php?sucesso_cad=1&id_veiculo=$id_veiculo");
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
	<span class="fonte_br_16"> AdmAuto / Meus Veículos / Alterar</span>
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
	echo "Informações do veículo alteradas no sistema.";
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

<div id="texto_1_off" style="width:auto; background:#FFF9DD; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<form action="MeusVeiculosAlterar.php?id_veiculo=<?php echo $_GET['id_veiculo']; ?>" method="post" id="alterar_veiculo">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">Placa:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="placa" id="placa" value="<?php echo $linha_listar_veiculo['placa']; ?>">
      <input name="id_veiculo" type="hidden" id="id_veiculo" value="<?php echo $linha_listar_veiculo['id']; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Renavam:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="renavam" id="renavam" value="<?php echo $linha_listar_veiculo['renavam']; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Marca:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="marca" id="marca" value="<?php echo $linha_listar_veiculo['marca']; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Modelo:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="modelo" id="modelo" value="<?php echo $linha_listar_veiculo['modelo']; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Cor:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cor" id="cor" value="<?php echo $linha_listar_veiculo['cor']; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Combustível:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="combustivel" id="combustivel" value="<?php echo $linha_listar_veiculo['combustivel']; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Ano Fab.:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="ano_fab" id="ano_fab" value="<?php echo $linha_listar_veiculo['ano_fab']; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Ano Mod.:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="ano_mod" id="ano_mod" value="<?php echo $linha_listar_veiculo['ano_mod']; ?>"></td>
  </tr>
</table>
<div id="div_centralizar">
<input name="btn_alterar" type="submit" class="btn_editar" id="btn_alterar" value="Alterar Veículo" />
</div>
</form>
</h4>
</div>
<?php } // // listar veiculos - fim ?>

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