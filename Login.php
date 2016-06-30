<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>.:: AdmAuto ::.</title>
<link rel="stylesheet" href="css/estilo.css"/>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16">Login AdmAuto</span>
</div>
<form action="Logar.php" method="post" id="login">
<div id="div_login">
<?php if($_GET['sucesso_alterar_login'] == 1) { // alteracao login sucesso - inicio ?>
<div id="div_sucesso">
<?php  
   	echo "Sucesso!";
	echo "<br>";
	echo "Dados de Login atualizados. Você já pode efetuar o login.";
?>
</div>
<?php } // alteracao login sucesso - fim ?>
<?php if($_GET['sucesso_cad'] == 1) { // div sucesso cadastro - inicio ?>
<div id="div_sucesso">
<?php  
   	echo "Seja bem vindo(a) ao AdmAuto!";
	echo "<br>";
	echo "Conta criada com sucesso! Você já pode efetuar o login.";
?>
</div>
<?php } // div sucesso cadastro - fim ?>
<?php if($_GET['erro'] == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php  
   	echo "Usuário ou senha incorretos. Favor tentar novamente, ou entrar em contato com o Suporte Técnico AdminAuto.";
	echo "<br>";
?>
</div>
<?php } // div erro - fim ?>
 <label for="email"><span class="fonte_pr_16">E-mail: </span></label><br>
 <input type="text" class="input_login" name="email" id="email" value=""><br>
 <label for="senha"><span class="fonte_pr_16">Senha: </span></label><br>
 <input class="input_login" name="senha" id="senha" type="password"><br>
 <input name="btn_login" type="submit" class="btn_editar" id="btn_login" value="Entrar" />
</div>
</form>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="PainelAdmAuto.php"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li> 
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>        
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>        
</body>
</html>