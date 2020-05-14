<?php 

$con = mysqli_connect('localhost','root','','lojavirtual');
if (!$con) {
	mysqli_errno($con);
	echo "Erro ao se conectar com o banco de dados".mysqli_error();
}
