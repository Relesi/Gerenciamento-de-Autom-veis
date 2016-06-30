<?php require_once('Session.php'); ?>
<?php
if($_POST['btn_cadastro_alterar']){ // POST - inicio	
// Dados de Login
$incluirEmail = $_POST['email'];
$incluirSenha = $_POST['senha'];
$incluirSenha2 = $_POST['senha2'];
$incluirSenhaCrip = sha1($incluirSenha); // criptografia sha1

// Inserir no banco de dados
if($incluirEmail and $incluirSenha and $incluirSenha2 == $incluirSenha){  // if triagem - inicio
mysql_select_db($database_conecta, $conecta);
$sql_alterar_cad = mysql_query("UPDATE cadastro_user SET
	email='$incluirEmail',
	senha='$incluirSenhaCrip'
WHERE id=$id_session_cad");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_alterar_cad){ // sucesso cadastro - inicio
header('Location: SairLogin.php');
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
</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Perfil / Dados de Login</span></div>
<div id="div_conteudo_ajuste">
<?php if($if_div_erro == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php
	if(!$incluirEmail){
		echo "Atenção! O campo *E-mail* é obrigatório.";
		echo "<br>";
		}
		if(!$incluirSenha){
		echo "Atenção! O campo *Senha* é obrigatório.";
		echo "<br>";
		}
		if(!$incluirSenha2){
		echo "Atenção! O campo *Confirmar Senha* é obrigatório.";
		echo "<br>";
		}
		if($incluirSenha != $incluirSenha2){
		echo "Atenção! O campo *Confirmar Senha* não confere.";
		echo "<br>";
		}
?>
</div>
<?php } // div erro - fim ?>

<div id="div_perfil">
Nome: <strong><?php echo $nome_session_cad; ?></strong><br>
E-mail: <strong><?php echo $email_session_cad; ?></strong><br>
Status: <strong><?php 
if($administrador_session_cad == 1){
echo "Administrador"; 
}else{
echo "Usuário";
}
?></strong><br><br>
<strong>Editar Cadastro:</strong> <br>
</div>

<form name="usuario" action="PerfilLoginSenha.php" method="post">
<div id="texto_1_off" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">E-mail:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="email" id="email" value="<?php echo "$email_session_cad"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Senha:</td>
    <td align="left" valign="middle"><input type="password" class="input_login" name="senha" id="senha" value=""></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Confirmar Senha:</td>
    <td align="left" valign="middle"><input type="password" class="input_login" name="senha2" id="senha2" value=""></td>
    </tr>
</table>
</h4>
</div>

<div id="div_centralizar">
<input name="btn_cadastro_alterar" type="submit" class="btn_editar" id="btn_cadastro_alterar" value="Alterar Login" />
</div>

</form>
</div>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="Perfil.php"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li>
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>   
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>  
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>
</body>
</html>