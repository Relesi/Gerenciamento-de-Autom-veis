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

<div id="texto_1_off" style="width:auto; background:#FFF9DD; padding:8px; border: 1px solid #CCC; border-radius:12px;">
  <?php
if ($_POST['postar_imagem']) {

$alterar_id = $_POST['id_veiculo'];
$imagem_deletar = $_POST['imagem_deletar'];
$erro = $config = array();
$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$config["tamanho"] = 8906883;
$config["largura"] = 8000;
$config["altura"]  = 8000;

if($arquivo){  
    if(!eregi("^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$", $arquivo["type"])){
$erro[] = "<span class='vermelho125'>";           
$erro[] = "ERRO - Arquivo em formato inválido! A imagem deve ser jpg, jpeg, gif ou png.";		   
$erro[] = "Por favor, envie outro arquivo.";
$erro[] = "</span>";
    }else{
        if($arquivo["size"] > $config["tamanho"]){
$erro[] = "<span class='vermelho125'>";		
$erro[] = "ERRO - Imagem em tamanho muito grande! A imagem deve ser de no máximo " . $config["tamanho"] . " bytes."; 
$erro[] = "Por favor, envie outra imagem.";
$erro[] = "</span>";
        }
        $tamanhos = getimagesize($arquivo["tmp_name"]);
        if($tamanhos[0] > $config["largura"])
        {
$erro[] = "<span class='vermelho125'>";			
$erro[] = "ERRO - Largura da imagem não deve ultrapassar " . $config["largura"] . " pixels.";
$erro[] = "Por favor, envie outra imagem.";
$erro[] = "</span>";
        }
        if($tamanhos[1] > $config["altura"])
        {
$erro[] = "<span class='vermelho125'>";			
$erro[] = "ERRO - Altura da imagem não deve ultrapassar " . $config["altura"] . " pixels.";
$erro[] = "Por favor, envie outra imagem.";
$erro[] = "</span>";
        }
    }
    if(sizeof($erro))
    {
        foreach($erro as $err)
        {
            echo " " . $err . "<BR>";
        }
    }else{
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
        $imagem_nome = md5(uniqid(time())) . "_" . rand(-9999999999, 999999999) . "." . $ext[1];
        $imagem_dir = "imagens_veiculos/" . $imagem_nome;
		$tmp_name = $arquivo["tmp_name"];
		$ext2 = $ext[1];
		if ($ext2 == 'JPEG' OR $ext2 == 'jpeg' OR $ext2 == 'JPG' or $ext2 == 'jpg') {
		$imagem = imagecreatefromjpeg($tmp_name);
		}
		if ($ext2 == 'GIF' OR $ext2 == 'gif') {
		$imagem = imagecreatefromgif($tmp_name);
		}
		if ($ext2 == 'PNG' OR $ext2 == 'png') {
		$imagem = imagecreatefrompng($tmp_name); 
		}
		$width = imagesx($imagem);
		$height = imagesy($imagem);
		$nova_imagem = imagecreatetruecolor(640, 480);
imagecopyresized($nova_imagem, $imagem, 0, 0, 0, 0, 640, 480, $width, $height);

imagedestroy($imagem);
		imagejpeg($nova_imagem, $imagem_dir);
		imagedestroy($nova_imagem);
		mysql_select_db($database_conecta, $conecta);
		$sql_alterar = mysql_query("UPDATE cadastro_veiculo SET imagem='$imagem_nome' WHERE id=$alterar_id");
}}}
		if($sql_alterar){	
		echo '<span class="fonte_sucesso">';
		echo "Sucesso!";
		echo '</span>';
		echo "&nbsp;";
		echo "&nbsp;";
		echo '<span class="fonte_sucesso">';
		echo "Atualiza&ccedil;&atilde;o efetuada.";
		echo '</span>';
		echo '<br>';
}
		if($sql_alterar){	// excluir imagem do diretorio se foi postada nova imagem
			
if($imagem_deletar){	// sem imagem no db nao exclui no diretorio pq nao tem		
// Caminho de onde a imagem será eexcluida
$imagem_dir = "imagens_veiculos/" . $imagem_deletar;		
// Exclui a imagem do diretorio
			unlink($imagem_dir);
	}
}
?>
</div>
</div>
<div id="div_menu_2">
 <ul id="menu_2">
   <li><a href="MeusVeiculosImagem.php?id=<?php echo $alterar_id; ?>"><img src="imagens/voltar.png" width="26" height="26"><br>Voltar</a></li>
   <li><a href="PainelAdmAuto.php"><img src="imagens/inicio.png" width="26" height="26"><br>Início</a></li>
   <li><a href="Sair.php"><img src="imagens/fechar.png" width="26" height="26"><br>Sair</a></li>   
 </ul>
</div>
<div id="div_rodape">
	<span class="fonte_br_16">Rápido e Fácil</span>
</div>
</body>
</html>