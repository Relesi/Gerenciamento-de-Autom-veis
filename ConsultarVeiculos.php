<?php require_once('Session.php'); ?>
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
</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Consultar Veículos</span>
</div>
<div id="div_conteudo_ajuste">

<div id="texto_1_off" style="width:auto; background:#C8C8C8; padding:8px; margin:4px; border: 1px solid #CCC; border-radius:12px;">
<div id="div_centralizar">
	<form id="formPesquisar" name="formPesquisar" method="get" action="ConsultarVeiculos.php">
		<span class="fonte_14_r">Consultar Placa:<br></span>
		<input name="busca" type="text" class="input_busca" id="busca" size="17" />
		<input name="buscar" type="submit" class="btn_editar" id="buscar" value="Buscar" />
	</form>
</div>
</div>

<?php
$busca = $_GET['busca'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_veiculo = mysql_query("SELECT * FROM cadastro_veiculo WHERE placa='$busca' AND id_user='$id_session_cad'");
$total_listar_veiculo = mysql_num_rows($sql_listar_veiculo);
while($linha_listar_veiculo = mysql_fetch_array($sql_listar_veiculo)){ // listar resultado - inicio
?>
<div id="div_listar_busca">
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
<?php
$id_veiculo = $linha_listar_veiculo['id'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_manutencao = mysql_query("SELECT * FROM cadastro_manutencao WHERE id_veiculo='$id_veiculo'");
$total_listar_manutencao = mysql_num_rows($sql_listar_manutencao);
while($linha_listar_manutencao = mysql_fetch_array($sql_listar_manutencao)){ // listar resultado manutencao - inicio
?>
<div id="div_listar_busca_manutencao">
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
</div>
<?php } // listar resultado manutencao - fim ?>
</div>
<?php } // listar resultado - fim ?>

<?php if($total_listar_veiculo <= 0 and $busca) { // resultado zero - inicio ?>
<div id="div_resultado_zero">
Nenhum veículo encontrado com essa placa.
</div>
<?php } // resultado zero - fim ?>

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