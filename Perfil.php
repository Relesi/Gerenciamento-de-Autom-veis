<?php require_once('Session.php'); ?>
<?php
if($_POST['btn_cadastro_alterar']){ // POST - inicio
// Informações Pessoais
$incluirNome = $_POST['nome'];
$incluirApelido = $_POST['apelido'];
$incluirCPF = $_POST['cpf'];
$incluirNasc = $_POST['nasc'];
$incluirTelefone = $_POST['telefone'];
$incluirCelular = $_POST['celular'];
// Endereço
$incluirCEP = $_POST['cep'];
$incluirEnd = $_POST['end'];
$incluirNum = $_POST['num'];
$incluirComp = $_POST['comp'];
$incluirBairro = $_POST['bairro'];
$incluirCidade = $_POST['cidade'];
$incluirEstado = $_POST['estado'];
$incluirPais = $_POST['pais'];
// data de cadastro
$incluir_date = date('Y/m/d');
$incluir_time = date('H:i:s');

// Inserir no banco de dados
if($incluirNome and $incluirCPF){  // if triagem - inicio
mysql_select_db($database_conecta, $conecta);
$sql_alterar_cad = mysql_query("UPDATE cadastro_user SET
	nome='$incluirNome',
	apelido='$incluirApelido',
	cpf='$incluirCPF',
	nasc='$incluirNasc',
	telefone='$incluirTelefone',
	celular='$incluirCelular',
	cep='$incluirCEP',
	end='$incluirEnd',
	num='$incluirNum',
	comp='$incluirComp',
	bairro='$incluirBairro',
	cidade='$incluirCidade',
	estado='$incluirEstado',
	pais='$incluirPais'
WHERE id=$id_session_cad");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_alterar_cad){ // sucesso cadastro - inicio
header('Location: Perfil.php?sucesso_cad=1');
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
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>
<body>
<div id="div_topo">
	<span class="fonte_br_16"> AdmAuto / Perfil</span></div>
<div id="div_conteudo_ajuste">
<?php if($_GET['sucesso_cad'] == 1) { // div sucesso cadastro - inicio ?>
<div id="div_sucesso">
<?php  
   	echo "Sucesso!";
	echo "<br>";
	echo "Cadastro atualizado.";
?>
</div>
<?php } // div sucesso cadastro - fim ?>
<?php if($if_div_erro == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php
	if(!$incluirNome){
		echo "Atenção! O campo *Nome* é obrigatório.";
		echo "<br>";
		}
		if(!$incluirCPF){
		echo "Atenção! O campo *CPF* é obrigatório.";
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

<form name="usuario" action="Perfil.php" method="post">

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_1]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Dados de Login:</a></li>
</ul>
<div id="texto_1" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td align="left" valign="middle">E-mail: <span class="fonte_14_rb"><?php echo "$email_session_cad"; ?></span></td>
    </tr>
  <tr>
    <td align="left" valign="middle">Senha: <span class="fonte_14_rb">******** (senha criptografada)</span></td>
    </tr>
  <tr>
    <td align="left" valign="middle">Atenção! <span class="vermelho125">Ao trocar o e-mail e/ou a senha, você será deslogado do sistema, e será necessário logar com os novos dados de login.</span></td>
    </tr>
  <tr>
    <td align="center" valign="middle"><input name="alterar" type="button" class="btn_editar" id="alterar" onClick="MM_goToURL('parent','PerfilLoginSenha.php');return document.MM_returnValue" value="Editar Dados de Login" /></td>
    </tr>
</table>
</h4>
</div>

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_2]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Informações Pessoais:</a></li>
</ul>
<div id="texto_2" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">Nome:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="nome" id="nome" value="<?php echo "$nome_session_cad"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Apelido:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="apelido" id="apelido" value="<?php echo "$apelido"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">CPF:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cpf" id="cpf" value="<?php echo "$cpf"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Data Nasc.:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="nasc" id="nasc" value="<?php echo "$nasc"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Telefone:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="telefone" id="telefone" value="<?php echo "$telefone"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Celular:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="celular" id="celular" value="<?php echo "$celular"; ?>"></td>
  </tr>
</table>
</h4>
</div>

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_3]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Endereço:</a></li>
</ul>
<div id="texto_3" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="right" valign="middle">CEP:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cep" id="cep" value="<?php echo "$cep"; ?>"></td>
  </tr>
  <tr>
    <td width="19%" align="right" valign="middle">Av./Rua/Trav.:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="end" id="end" value="<?php echo "$end"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Número:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="num" id="num" value="<?php echo "$num"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Complemento:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="comp" id="comp" value="<?php echo "$comp"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Bairro:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="bairro" id="bairro" value="<?php echo "$bairro"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Cidade:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cidade" id="cidade" value="<?php echo "$cidade"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Estado:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="estado" id="estado" value="<?php echo "$estado"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">País:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="pais" id="pais" value="<?php echo "$pais"; ?>"></td>
  </tr>
</table>
</h4>
</div>

<div id="div_centralizar">
<input name="btn_cadastro_alterar" type="submit" class="btn_editar" id="btn_cadastro_alterar" value="Alterar Cadastro" />
</div>

</form>
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