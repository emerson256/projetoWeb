<?php
require_once('../includes/conexao.php');
session_start();

function clear($input) {
    global $connect;
    // sql injection
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-salvar']) && isset($_SESSION['logado'])) {

	$titulo_anuncio = clear($_POST['titulo_anuncio']);
	$descricao_anuncio = clear($_POST['descricao']);
	$telefone1_freelancer = clear($_POST['telefone1']);
	$telefone2_freelancer = clear($_POST['telefone2']);
	$estado_freelancer = clear($_POST['estado']);
	$cidade_freelancer = clear($_POST['cidade']);
	$id_freelancer = $_SESSION['id_usuario'];

	echo $titulo_anuncio."<br>";
	echo $descricao_anuncio."<br>";
	echo $telefone2_freelancer."<br>";


	$sql = "SELECT anuncio_id from freelancers WHERE id = '$id_freelancer';";
	$resultado = mysqli_query($connect,$sql);
	$resultado = mysqli_fetch_array($resultado);
	$anuncio_id = $resultado['anuncio_id'];
	$sql = "UPDATE anuncios SET titulo_anuncio = '$titulo_anuncio', descricao = '$descricao_anuncio' WHERE id = '$anuncio_id';";
	$resultado = mysqli_query($connect,$sql);

	$sql = "UPDATE freelancers SET estado = '$estado_freelancer', cidade = '$estado_freelancer', telefone1 ='$telefone1_freelancer', telefone2 = '$telefone2_freelancer' WHERE id = '$id_freelancer'; ";
	mysqli_query($connect, $sql);
	header('Location: ../index.php');

} else {
	//header('Location: ../painelFreelancer.php');
}

 ?>