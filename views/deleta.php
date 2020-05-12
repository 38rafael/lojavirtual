<?php 
require_once 'conecta.php';
session_start();
echo $_GET["id"];
$id        = $_GET['id'];
$deleta = "DELETE FROM produtos WHERE id=$id";
$query     = mysqli_query($con, $deleta);
header(	"Location:deletaproduto.php");


