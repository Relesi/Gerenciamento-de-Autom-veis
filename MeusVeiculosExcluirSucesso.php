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

<div id="div_listar">

<?php
if ($_POST['sim_excluir']) {
	
	$alterar_id = $_POST['id_veiculo'];
	$imagem_deletar = $_POST['imagem_deletar'];
	// Excluir dados no banco de dados
	mysql_select_db($database_conecta, $conecta);
	$sql_excluir = mysql_query("DELETE FROM cadastro_veiculo WHERE id=$alterar_id");
	
if($sql_excluir){	// excluir imagem do diretorio se foi excluida do db - inicio	
if($imagem_deletar){	// sem imagem no db nao exclui no diretorio pq nao tem	
// Caminho de onde a imagem será eexcluida
$imagem_dir = "imagens_veiculos/" . $imagem_deletar;		
// Exclui a imagem do diretorio
			unlink($imagem_dir);
	}
} // excluir imagem do diretorio se foi excluida do db - fim

if($sql_excluir){	// excluir manutencoes - inicio
mysql_select_db($database_conecta, $conecta);
$query_consulta_deletar_manutencao = mysql_query("SELECT * FROM cadastro_manutencao WHERE id_veiculo='$id_veiculo'");
$total_listar_manutencao = mysql_num_rows($query_consulta_deletar_manutencao);
while($linha_consulta_deletar_manutencao = mysql_fetch_array($query_consulta_deletar_manutencao)){ // listar - inicio
$alterar_id_manutencao = $linha_consulta_deletar_manutencao['id'];
	$sql_excluir2 = mysql_query("DELETE FROM cadastro_manutencao WHERE id=$alterar_id_manutencao");
} // listar - fim
	} // excluir manutencoes - fim

} 
?>
<?php if($sql_excluir){ ?>
<span class="fonte_sucesso">Sucesso! Veículo excluido.</span>
<?php } ?>
</div>
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