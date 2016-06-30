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
<!--

//-->
</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Meus Veículos / Excluir</span>
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

<div id="texto_2_off" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">

<?php
$id_veiculo = $_GET['id_veiculo'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_veiculo = mysql_query("SELECT * FROM cadastro_veiculo WHERE id='$id_veiculo' AND id_user='$id_session_cad' ORDER BY id DESC");
$total_listar_veiculo = mysql_num_rows($sql_listar_veiculo);
while($linha_listar_veiculo = mysql_fetch_array($sql_listar_veiculo)){ // listar veiculos - inicio
?>
<div id="div_listar">
<span class="vermelho125">Tem certeza que deseja excluir esse veículo, com as imagens e com todas as informações de manutenção?</span>
<form action="MeusVeiculosExcluirSucesso.php?id_veiculo=<?php echo "$id_veiculo"; ?>" method="post" id="excluir">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle" class="fonte_14_r">Placa:</td>
    <td width="81%" align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['placa']; ?> <span class="g17">
      <input name="id_veiculo" type="hidden" id="id_veiculo" value="<?php echo $linha_listar_veiculo['id']; ?>" />
      <span class="cinzaclaro125">
      <input name="imagem_deletar" type="hidden" id="imagem_deletar" value="<?php echo $linha_listar_veiculo['imagem']; ?>" />
      </span></span></td>
    </tr>
  <tr>
    <td align="right" valign="middle" class="fonte_14_r">Renavam:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['renavam']; ?> </td>
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
  <input name="sim_excluir" type="submit" class="btn_editar" id="sim_excluir" value="Sim, Excluir." />
</div>
</form>
</div>
<?php } // // listar veiculos - fim ?>
<?php if($total_listar_veiculo <= 0) { // resultado zero - inicio ?>
<div id="div_resultado_zero">
Nenhum veículo encontrado com esse id.
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