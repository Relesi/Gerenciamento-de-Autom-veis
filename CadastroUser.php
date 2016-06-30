<?php require_once('Session.php'); ?>
<?php
// Página de conexão com o banco de dados MYSQL
include "Connections/conecta.php";
$id_user = $_GET['id_user'];
$id_cadastro = $_GET['id_cadastro_user'];
 // POST - inicio

// Dados user
  $incluirIdUser = $id_session_cad;
// Informações Usuários
  $incluirIdUser = $_POST['id_user'];
  $incluiradministrador = $_POST['administrador'];
  $incluirApelido = $_POST['apelido'];
  $incluirBairro = $_POST['bairro'];
  $incluirCelular = $_POST['celular'];
  $incluirCidade = $_POST['cidade'];
  $incluirCPF = $_POST['cpf'];
// data de cadastro
  $incluir_date = date('Y/m/d');
  $incluir_time = date('H:i:s');

// Inserir no banco de dados
  if($incluiradministrador){  // if triagem - inicio
    mysql_select_db($database_conecta, $conecta);
    $sql_cadastro_user = mysql_query("UPDATE cadastro_user SET
	administrador='$incluirAdministradordor',
	apelido='$incluirApelido',
	bairro='$incluirBairro',
	celular='$incluirCelular'
WHERE id=$incluirIdManutencao");
  }else{ // if triagem - meio
    $if_div_erro = 1;
  } // if triagem - fim
  if($sql_cadastro_user){ // sucesso cadastro - inicio
    header("Location: CadastroUser.php?sucesso_cad=1&id_veiculo=$id_user&id_user=$id_cadastro");
   // sucesso cadastro - fim
}  // POST - fim
?>










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
	<span class="fonte_br_16"> AdmAuto / Usuário Cadastrados</span>
</div>
<div id="div_conteudo_ajuste">

<div id="texto_1_off" style="width:auto; background:#C8C8C8; padding:8px; margin:4px; border: 1px solid #CCC; border-radius:12px;">
<div id="div_centralizar">
	<form id="formPesquisar" name="formPesquisar" method="get" action="CadastroUser.php">
		<span class="fonte_14_r">Consultar Usuários:<br></span>
		<input name="busca" type="text" class="input_busca" id="busca" size="17" />
		<input name="buscar" type="submit" class="btn_editar" id="buscar" value="Buscar" />
	</form>
</div>
</div>





<!--<div id="div_cadastro_user">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="19%" align="right" valign="top" class="fonte_14_r">Título dtto Serviço:</td>
    <td width="81%" align="left" valign="top" class="fonte_14_rb"><?php echo $linha_cadastro_user['titulo']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="top" class="fonte_14_r">Descrição do Serviço:</td>
    <td align="left" valign="top" class="fonte_14_rb"><?php echo $linha_cadastro_user['descricao']; ?></td>
    </tr>
  <tr>
    <td align="right" valign="top" class="fonte_14_r">Quem executou o Serviço:</td>
    <td align="left" valign="top" class="fonte_14_rb"><?php echo $linha_cadastro_user['quem_executou']; ?></td>
  </tr>
  <tr>
    <td align="right" valign="top" class="fonte_14_r">Data desta Manutenção:</td>
    <td align="left" valign="top" class="fonte_14_rb"><?php echo $linha_cadastro_user['data_servico']; ?> </td>
    </tr>
</table>
</div>
<?php  // listar resultado manutencao - fim ?>
</div>     -->


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






<?php if($total_cadastro_user <= 0 and $cadastro_user) { // resultado zero - inicio ?>
<div id="div_resultado_zero">
Nenhum usuário encontrado com esse nome.
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