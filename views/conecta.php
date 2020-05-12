<?php 

$con = mysqli_connect('localhost','root','','lojavirtual');
if (!$con) {
	echo "Erro ao se conectar com o banco de dados";
}