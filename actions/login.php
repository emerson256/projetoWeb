<?php
require_once('../includes/conexao.php');

function obter_id_freelancer($email) {
	global $connect;
	$sql = "SELECT id FROM freelancers WHERE usuarios_email = '$email';";
	$resultado = mysqli_query($connect,$sql);
	if(mysqli_num_rows($resultado) > 0) {
	    $dados_freelancer = mysqli_fetch_array($resultado);
	    return $dados_freelancer['id'];
	}

	return -1;
}

function obter_nome_freelancer($email) {
	global $connect;
	$sql = "SELECT nome FROM freelancers WHERE usuarios_email = '$email';";
	$resultado = mysqli_query($connect,$sql);
	if(mysqli_num_rows($resultado) > 0) {
	    $dados_freelancer = mysqli_fetch_array($resultado);
	    return $dados_freelancer['nome'];
	}

	return -1;
}


session_start();
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $email = mysqli_escape_string($connect,$_POST['email']);
    $senha = mysqli_escape_string($connect,$_POST['senha']);

    if(empty($email) or empty($senha)):
        $erros[] = "<li>O campo email/senha precisa ser preenchido";
    else:
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($connect,$sql);

        if(mysqli_num_rows($resultado) > 0):
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $resultado = mysqli_query($connect,$sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                if($dados['nivel_acesso'] == '1'): //frelancer
                
                	$_SESSION['logado'] = true;
                	$_SESSION['id_usuario'] = obter_id_freelancer($dados['email']);
                	$_SESSION['email'] = $dados['email'];
                	$_SESSION['nivel_acesso'] = '1';
                	$_SESSION['nome'] = obter_nome_freelancer($dados['email']);
                	header('Location: ../painelFreelancer.php');

                endif;
                mysqli_close($connect);


            else:
                $erros[] = "<li>Usuário e senha não conferem</li>";
                header('Location: ../index.php');
            endif;

        else:
            $erros[] = "<li>Usuário inexistente</li>";
            header('Location: ../index.php');
        endif;

    endif;

endif;

?>