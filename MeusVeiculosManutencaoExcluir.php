<?php require_once('Session.php'); ?>
<?php
$id_veiculo = $_GET['id_veiculo'];
$id_manutencao = $_GET['id_manutencao'];
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
	<span class="fonte_br_16"> AdmAuto / Meus Veículos / Manutenção / Excluir</span>
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

<div id="texto_2_off" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">

<?php
$id_veiculo = $_GET['id_veiculo'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_manutencao = mysql_query("SELECT * FROM cadastro_manutencao WHERE id='$id_manutencao' AND id_user='$id_session_cad' AND id_veiculo='$id_veiculo' ORDER BY id DESC");
$total_listar_manutencao = mysql_num_rows($sql_listar_manutencao);
while($linha_listar_manutencao = mysql_fetch_array($sql_listar_manutencao)){ // listar veiculos - inicio
?>
<div id="div_listar">
<span class="vermelho125">Tem certeza que deseja excluir essa manutenção?</span>
<form action="MeusVeiculosManutencaoExcluirSucesso.php?id_veiculo=<?php echo "$id_veiculo"; ?>" method="post" id="excluir">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="top" class="fonte_14_r">Título do Serviço:</td>
    <td width="81%" align="left" valign="top" class="fonte_14_rb"><?php echo $linha_listar_manutencao['titulo']; ?><span class="g17">
      <input name="id_manutencao" type="hidden" id="id_manutencao" value="<?php echo $linha_listar_manutencao['id']; ?>" />
    </span></td>
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
  <input name="sim_excluir" type="submit" class="btn_editar" id="sim_excluir" value="Sim, Excluir." />
</div>
</form>
</div>
<?php } // // listar veiculos - fim ?>
<?php if($total_listar_veiculo <= 0) { // resultado zero - inicio ?>
<div id="div_resultado_zero">
Nenhuma manutenção encontrada com esse id.
</div>
<?php } // resultado zero - fim ?>
</div>

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