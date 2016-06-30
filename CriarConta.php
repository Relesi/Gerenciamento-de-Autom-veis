<?php
if($_POST['btn_cadastro']){ // POST - inicio
// Página de conexão com o banco de dados MYSQL
include "Connections/conecta.php";	
// Dados de Login
$incluirEmail = $_POST['email'];
$incluirSenha = $_POST['senha'];
$incluirSenha2 = $_POST['senha2'];
$incluirSenhaCrip = sha1($incluirSenha); // criptografia sha1
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

// Cadastro Repetido E-MAIL - inicio
mysql_select_db($database_conecta, $conecta);
$email_repetido = strip_tags(trim($_POST['email']));
$re_repetido = mysql_query("select count(*) as total from cadastro_user where email='$email_repetido'");
$total_email_repetido = mysql_result($re_repetido, 0, "total");
// Cadastro Repetido E-MAIL - fim

// Inserir no banco de dados
if($incluirEmail and $incluirSenha and $incluirSenha2 == $incluirSenha and $total_email_repetido == 0){  // if triagem - inicio
mysql_select_db($database_conecta, $conecta);
$sql_incluir_cad = mysql_query("INSERT INTO cadastro_user (
	email,
	senha,
	nome,
	apelido,
	cpf,
	nasc,
	telefone,
	celular,
	cep,
	end,
	num,
	comp,
	bairro,
	cidade,
	estado,
	pais,
	date,
	time
) VALUES (
	'$incluirEmail',
	'$incluirSenhaCrip',
	'$incluirNome',
	'$incluirApelido',
	'$incluirCPF',
	'$incluirNasc',
	'$incluirTelefone',
	'$incluirCelular',
	'$incluirCEP',
	'$incluirEnd',
	'$incluirNum',
	'$incluirComp',
	'$incluirBairro',
	'$incluirCidade',
	'$incluirEstado',
	'$incluirPais',
	'$incluir_date',
	'$incluir_time'
)");
}else{ // if triagem - meio
$if_div_erro = 1;
} // if triagem - fim
if($sql_incluir_cad){ // sucesso cadastro - inicio
header('Location: Login.php?sucesso_cad=1');
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
	<span class="fonte_br_16">Criar Conta AdmAuto</span>
</div>
<div id="div_conteudo_ajuste">
<?php if($if_div_erro == 1) { // div erro - inicio ?>
<div id="div_erro">
<?php
	if(!$incluirEmail){
		echo "Atenção! O campo *E-mail* é obrigatório.";
		echo "<br>";
		}
		if($total_email_repetido > 0){
		echo "Atenção! E-mail já cadastrado no sistema.";
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

<form name="usuario" action="CriarConta.php" method="post">

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_1]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Dados de Login:</a></li>
</ul>
<div id="texto_1" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">E-mail:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="email" id="email" value="<?php echo "$incluirEmail"; ?>"></td>
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

<ul id="menu_4">
<li><a href="#" rel="toggle[texto_2]" data-openimage="imagens/menos.png" data-closedimage="imagens/mais.png"><img src="imagens/mais.png" border="0" />Informações Pessoais:</a></li>
</ul>
<div id="texto_2" style="width:auto; background:#E8FAFF; padding:8px; border: 1px solid #CCC; border-radius:12px;">
<h4 class="fonte_pr_14">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="middle">Nome:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="nome" id="nome" value="<?php echo "$incluirNome"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Apelido:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="apelido" id="apelido" value="<?php echo "$incluirApelido"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">CPF:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cpf" id="cpf" value="<?php echo "$incluirCPF"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Data Nasc.:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="nasc" id="nasc" value="<?php echo "$incluirNasc"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Telefone:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="telefone" id="telefone" value="<?php echo "$incluirTelefone"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Celular:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="celular" id="celular" value="<?php echo "$incluirCelular"; ?>"></td>
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
    <td align="left" valign="middle"><input type="text" class="input_login" name="cep" id="cep" value="<?php echo "$incluirCEP"; ?>"></td>
  </tr>
  <tr>
    <td width="19%" align="right" valign="middle">Av./Rua/Trav.:</td>
    <td width="81%" align="left" valign="middle"><input type="text" class="input_login" name="end" id="end" value="<?php echo "$incluirEnd"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Número:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="num" id="num" value="<?php echo "$incluirNum"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Complemento:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="comp" id="comp" value="<?php echo "$incluirComp"; ?>"></td>
    </tr>
  <tr>
    <td align="right" valign="middle">Bairro:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="bairro" id="bairro" value="<?php echo "$incluirBairro"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Cidade:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="cidade" id="cidade" value="<?php echo "$incluirCidade"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Estado:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="estado" id="estado" value="<?php echo "$incluirEstado"; ?>"></td>
  </tr>
  <tr>
    <td align="right" valign="middle">País:</td>
    <td align="left" valign="middle"><input type="text" class="input_login" name="pais" id="pais" value="<?php echo "$incluirPais"; ?>"></td>
  </tr>
</table>
</h4>
</div>
<br>
<span class="fonte_pr_14">Ao clicar em "Enviar Cadastro",  declara ter lido e concordado com os nossos <a href="Termos.html">Termos e Condições</a>.</span>
<br>
<div id="div_centralizar">
<input name="btn_cadastro" type="submit" class="btn_editar" id="btn_cadastro" value="Enviar Cadastro" />
</div>

</form>
</div>
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