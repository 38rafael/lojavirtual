<?php 
require_once 'conecta.php';

if (isset($_POST['nome'])) {
	$arquivo_temporario = $_FILES['imagem']['tmp_name'];
	$arquivo            = basename($_FILES['imagem']['name']);
	$diretorio          = '../assets/imagens';
	$nome               = $_POST['nome'];
	$descricao          = $_POST['descricao'];
	$imagem             = ($diretorio.'/'.$arquivo);

	echo "<pre>";
	print_r($_FILES['imagem']);
	echo "</pre>";

	move_uploaded_file($arquivo_temporario, $diretorio.'/'.$arquivo);

	

	$insere    = "INSERT INTO produtos (nome, descricao, imagem) VALUES ('$nome','$descricao','$imagem')";
	$query     = mysqli_query($con, $insere);
	header("Location:cadastraproduto.php");
	
}

