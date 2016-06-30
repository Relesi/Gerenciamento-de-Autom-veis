<?php require_once('Session.php'); ?>
<?php include "Connections/conecta.php"; ?>
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
	<span class="fonte_br_16"> AdmAuto / Meus Veículos / Imagem</span></div>
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
$id = $_GET['id'];
mysql_select_db($database_conecta, $conecta);
$sql_listar_veiculo = mysql_query("SELECT * FROM cadastro_veiculo WHERE id='$id' AND id_user='$id_session_cad' ORDER BY id DESC");
$total_listar_veiculo = mysql_num_rows($sql_listar_veiculo);
while($linha_listar_veiculo = mysql_fetch_array($sql_listar_veiculo)){ // listar veiculos - inicio
?>

<div id="texto_1_off" style="width:auto; background:#FFF9DD; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<?php if($linha_listar_veiculo['imagem']) { // imagem ?>                    
<img src="imagens_veiculos/<?php echo $linha_listar_veiculo['imagem']; ?>"alt="" width="237" height="175" border="0" />
<?php }else{ // imagem ?>
<img src="imagens/imagem_padrao2.png" width="237" height="175" border="0" />
<?php } // imagem ?>
<span class="fonte_sucesso">Imagem atual.</span>
<h4 class="fonte_pr_14">
  <form action="MeusVeiculosImagemSucesso.php" method="post" enctype="multipart/form-data" id="alterar_veiculo">
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="2" align="left" valign="middle">Nova imagem:      
      <label>
        <input name="foto" type="file" class="btn_arq" id="foto" size="8">
      </label></td>
    </tr>
  <tr>
    <td colspan="2" align="left" valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td width="19%" align="right" valign="middle">Placa:</td>
    <td width="81%" align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['placa']; ?>
      <input name="id_veiculo" type="hidden" id="id_veiculo" value="<?php echo $linha_listar_veiculo['id']; ?>">
      <span class="cinzaclaro125">
        <input name="imagem_deletar" type="hidden" id="imagem_deletar" value="<?php echo $linha_listar_veiculo['imagem']; ?>" />
        </span></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Renavam:</td>
    <td align="left" valign="middle" class="fonte_14_rb"><?php echo $linha_listar_veiculo['renavam']; ?></td>
    </tr>
</table>
<div id="div_centralizar">
<input name="postar_imagem" type="submit" class="btn_editar" id="postar_imagem" value="Alterar Imagem" />
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