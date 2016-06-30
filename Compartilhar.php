<?php require_once('Session.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>.:: AdmAuto ::.</title>
<link rel="stylesheet" href="css/estilo.css"/>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16">Compartilhar AdmAuto</span>
</div>
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
<div id="div_centralizar">
<ul id="menu_3">
  <li><a href="http://www.facebook.com.br" target="_blank"><img src="imagens/rede_social_facebook.png" width="100" height="100" border="0"><br>Facebook</a></li>
  <li><a href="https://plus.google.com/?gpsrc=ogpy0&tab=wX" target="_blank"><img src="imagens/rede_social_gmais.png" width="100" height="100" border="0"><br>Google G+</a></li>
  <li><a href="http://www.twitter.com" target="_blank"><img src="imagens/rede_social_twitter.png" width="100" height="100" border="0"><br>Twitter</a></li>
</ul>  
</div>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="javascript:history.go(-1)"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li>
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>        
 </ul>
</div>    
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>    
</body>
</html>