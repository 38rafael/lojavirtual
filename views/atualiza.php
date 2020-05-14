<?php 
require_once 'conecta.php';
session_start();

if (isset($_GET['id'])) {
	$id         = $_GET['id'];
	$seleciona = "SELECT * FROM produtos WHERE id=$id";
	$query      = mysqli_query($con, $seleciona);
	$fetch = mysqli_fetch_array($query);

}
?>
<?php 

if(isset($_POST['nome'])){
	
	if(!is_null($_POST['imagem'])){
		$nome               = $_POST['nome'];
		$descricao          = $_POST['descricao'];
		$id                 = $_POST['id'];

		$atualiza  = "UPDATE produtos SET nome='$nome', descricao='$descricao' WHERE id=$id ";
		$query     = mysqli_query($con, $atualiza);
		header("Location:atualizaproduto.php");
	}else{
		$arquivo_temporario = $_FILES['imagem']['tmp_name'];
		$arquivo            = basename($_FILES['imagem']['name']);
		$diretorio          = '../assets/imagens';
		$nome               = $_POST['nome'];
		$descricao          = $_POST['descricao'];
		$imagem             = ($diretorio.'/'.$arquivo);
		$id                 = $_POST['id'];

		move_uploaded_file($arquivo_temporario, $diretorio.'/'.$arquivo);

		$atualiza  = "UPDATE produtos SET nome='$nome', descricao='$descricao', imagem= '$imagem' WHERE id=$id ";
		$query     = mysqli_query($con, $atualiza);
		header("Location:atualizaproduto.php");
	}
}
?>

<!doctype html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Lojas Tudo Aqui</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Lojas Tudo Aqui</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="logout.php">logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container " >
		<div class="row">
			<div class="col-md-3" style="min-height: calc(100vh - 50px); background-color: lightblue;">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" style="color: #333; margin-top: 10px;" href="arearestrita.php">Área Restrita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: #333; margin-top: 10px;" href="cadastraproduto.php">Cadastrar Novo Produto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: #333; margin-top: 10px;" href="deletaproduto.php">Deleta Produtos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: #333; margin-top: 10px;" href="atualizaproduto.php">Atualizar Produtos</a>
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<form class="form-group" action="atualiza.php" method="post" enctype="multipart/form-data">
					<br/><label>Nome:</label>
					<input class="form-control" type="text" name="nome" value="<?php echo $fetch['nome']; ?>">
					<label>Descrição:</label>	
					<textarea class="form-control" name="descricao"><?php echo $fetch['descricao']; ?></textarea>
					<label>Imagem Atual:</label><br>
					<input type="hidden" name="imagem-atual" value="<?php echo $fetch['imagem']; ?>">
					<img class="img-fluid" width="200" height="200" src="<?php echo $fetch['imagem']; ?>"><br>
					<label>Selecionar Nova Imagem:</label><br>
					<input id="upload" type="file" name="imagem" value="<?php echo $fetch['imagem'];?>" /><br><br>


					<input type="hidden" name="id" value="<?php echo $fetch['id']; ?>">

					<button class="btn btn-primary">Enviar</button>
				</form>
			</div>

		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="../assets/js/script.js"></script>
</body>

</html>

