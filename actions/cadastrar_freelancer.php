<?php
session_start();
//$erros = array();
require_once("../includes/conexao.php");


$erro = false;

?>

<?php

function clear($input) {
    global $connect;
    // sql injection
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

function email_existe($email) {
	global $connect;
	$sql = "SELECT email FROM usuarios WHERE email = '$email';";
	$resultado = mysqli_query($connect,$sql);
	if(mysqli_num_rows($resultado) > 0) {
		return true;

	} else {
		return false;
	}
}

// function buscar_id_usuario($email) {
// 	global $connect;
// 	$sql = "SELECT email FROM usuarios WHERE email = '$email';";
// 	$resultado = mysqli_query($connect,$sql);
// 	if(mysqli_num_rows($resultado) > 0) {
// 		return true;

// 	} else {
// 		return false;
// 	}	
// }

function buscar_id_servico($nomeServico) {
	global $connect;
	$sql = "SELECT id FROM servicos WHERE nome = '$nomeServico';";
	$resultado = mysqli_query($connect,$sql);
	$dados = mysqli_fetch_array($resultado);
	if(mysqli_num_rows($resultado) > 0) {
		return $dados['id'];

	} else {
		return -1;
	}
}

function criar_usuario($email,$senha) {
	global $connect;
	$senha = md5($senha);
	$sql = "INSERT INTO usuarios (email,senha,nivel_acesso) VALUES ('$email','$senha','1');";
	$resultado = mysqli_query($connect,$sql);
	//return mysqli_insert_id($connect);
}

function preparar_anuncio() {
	global $connect;
	
	$sql = "INSERT INTO anuncios (ativo) VALUES ('0');";
	$resultado = mysqli_query($connect,$sql);
	//$sql = "INSERT INTO anuncios (ativo) VALUES ('0');";

	return mysqli_insert_id($connect);
}


if(isset($_POST['btn-assinar'])) {

	if(email_existe($_POST['email'])) {
		// array_push($_SESSION['erros'],'Este email já está em uso!');
		$erro = true;
	}

	$nome = clear($_POST['nome']);
	$sobrenome = clear($_POST['sobrenome']);
	$usuarios_email = clear($_POST['email']);
	$cpf = clear($_POST['cpf']);
	$cnpj = clear($_POST['cnpj']);
	$telefone1 = clear($_POST['telefone1']);
	$telefone2 = clear($_POST['telefone2']);
	$senha = $_POST['senha'];
	$servico_id = buscar_id_servico($_POST['atuacao']);
	$estado = clear($_POST['estado']);
	$cidade = clear($_POST['cidade']);
	// var_dump($_POST);

	if(!$erro) {

		criar_usuario($usuarios_email,$senha);
		$anuncio_id = preparar_anuncio();
		$sql = "INSERT INTO freelancers (nome,sobrenome,cpf,cnpj,telefone1,telefone2,estado,cidade,anuncio_id,servico_id, usuarios_email) VALUES ('$nome','$sobrenome','$cpf','$cnpj','$telefone1','$telefone2','$estado','$cidade','$anuncio_id','$servico_id','$usuarios_email');";
		$resultado = mysqli_query($connect,$sql);

		header('Location: ../painelFreelancer.php');



		//$sql = "INSERT INTO freelancers (nome,sobrenome,cpf,cnpj,telefone1,telefone2,cidade,) VALUES()"
	} else {
		header('Location: ../cadastro.php');
	}
}

?>