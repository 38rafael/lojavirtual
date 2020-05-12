<?php 
require_once 'conecta.php';
session_start();
	$buscaproduto = "SELECT * FROM produtos";
	$query        = mysqli_query($con, $buscaproduto );
	
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
            <a class="nav-link" style="color: #333; margin-top: 10px;" href="cadastraproduto.php">Cadastrar Novo Produto</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" style="color: #333; margin-top: 10px;" href="deletaproduto.php">Deleta Produtos</a>
        </li>
        </ul>
      </div>
    <div class="col-md-6">
		
		<table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Imagem</th>
      <th scope="col">Remover</th>
    </tr>
  </thead>
  <tbody>
  	<?php while($info= mysqli_fetch_array($query)){
  		?>
  	<tr>
      <th scope="row"><?php echo $info['id']; ?></th>
      <td><?php echo $info['nome']; ?></td>
      <td><?php echo $info['descricao']; ?></td>
      <td><img width="100" height="100" src="<?php echo $info['imagem']; ?>"></td>
      <td><a href="deleta.php?id=<?php echo $info['id'] ?>"><img width="50" height="50" src="../assets/imagens/x.png"></a></td>
    </tr>
    <?php
  }?>
  </tbody>
</table>
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