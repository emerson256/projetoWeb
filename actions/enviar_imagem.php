<?php
session_start();
require_once "../includes/conexao.php";
?>


<?php


if(isset($_POST['btn-enviar']) && $_SESSION['logado']) {
	$anuncio_id = $_POST['anuncio_id'];
	$foto = '';

	$formatosPermitidos = array("png","jpg","jpeg","gif");
	$extensao = pathinfo($_FILES['anuncio-foto']['name'],PATHINFO_EXTENSION);


	if(in_array($extensao,$formatosPermitidos)):

        //$pasta = "../img-anuncios/".$_POST['anuncio_id'];
        $pasta = "../imgs-anuncios/";
        $temporario = $_FILES['anuncio-foto']['tmp_name'];
        //$nome = $_POST['anuncio_id'];
        $nome = uniqid().".$extensao";
        move_uploaded_file($temporario,$pasta.$nome);
        //$foto = $nome."".$extensao;
        $foto = $nome;
    else:
        echo "$extensao não é permitido<br>";
    endif;

	$sql = "UPDATE anuncios SET imagem = '$foto' WHERE id = '$anuncio_id' ";
	if(mysqli_query($connect, $sql)) {
		header('Location: ../painelFreelancer.php');
	} else {
		//header('Location: ../painelFreelancer.php');
		echo "erro ao cadastrar";
	}
}

?>