<?php
session_start();
require_once("includes/conexao.php");

$erros = array();

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
//  global $connect;
//  $sql = "SELECT email FROM usuarios WHERE email = '$email';";
//  $resultado = mysqli_query($connect,$sql);
//  if(mysqli_num_rows($resultado) > 0) {
//      return true;

//  } else {
//      return false;
//  }   
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
        //$erro = true;

        $erros[] = '<li>Este email já está em uso!</li>';
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

    if(empty($erros)) {

        criar_usuario($usuarios_email,$senha);
        $anuncio_id = preparar_anuncio();
        $sql = "INSERT INTO freelancers (nome,sobrenome,cpf,cnpj,telefone1,telefone2,estado,cidade,anuncio_id,servico_id, usuarios_email) VALUES ('$nome','$sobrenome','$cpf','$cnpj','$telefone1','$telefone2','$estado','$cidade','$anuncio_id','$servico_id','$usuarios_email');";
        $resultado = mysqli_query($connect,$sql);

        $_SESSION['logado'] = true;
        $_SESSION['email'] = $usuarios_email;

        header('Location: painelFreelancer.php');



        //$sql = "INSERT INTO freelancers (nome,sobrenome,cpf,cnpj,telefone1,telefone2,cidade,) VALUES()"
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>konsertaki - Cadastro freelancer</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="mb-5">
        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.html">konsertaki</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="O que você precisa?" aria-label="search">
                        <button class="btn btn-outline-success my-2-sm-0">Buscar</button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Serviços
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="alvenaria.html">Alvenaria</a>
                                <a class="dropdown-item" href="portfolio-2-col.html">Elétrica</a>
                                <a class="dropdown-item" href="portfolio-3-col.html">Hidráulica</a>
                                <a class="dropdown-item" href="portfolio-4-col.html">Jardinagem</a>
                                <a class="dropdown-item" href="portfolio-item.html">Limpeza</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contas.html">Criar conta</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal_login">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="painelFreelancer.html">Painel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div class="container" style="margin-top: 5em;">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <img class="img-fluid" src="img/teste3.jpg" alt="">
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Crie sua conta</h4>
                <form class="needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <?php
                            if(!empty($erros)):
                                foreach($erros as $erro):
                                    echo $erro;
                                endforeach;
                            echo "<hr>";
                            endif;
                             ?>
                            <label for="atuacao">Atuarei como:</label>
                            <select class="custom-select d-block w-100" id="atuacao" name="atuacao" required>
                                <option value="">Escolha...</option>
                                <?php
                                 $sql = "SELECT * FROM servicos";
                                 $resultado = mysqli_query($connect,$sql);
                                 if(mysqli_num_rows($resultado) > 0):
                                 while($dados = mysqli_fetch_array($resultado)):

                                 ?>

                                <option><?php echo $dados['nome']; ?></option>
                                <?php
                                 endwhile;
                             endif;

                                 ?>

<!--                                 <option>Encanador</option>
                                <option>Pintor</option>
                                <option>Jardineiro</option> -->

                            </select>
                            <div class="invalid-feedback">
                                Selecione um serviço.
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" value="" name="nome" required>
                            <div class="invalid-feedback">
                                Nome é requerido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome" value="" required name="sobrenome">
                            <div class="invalid-feedback">
                                Sobrenome é requerido.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" placeholder="Digite seu CPF" value="" required name="cpf">
                            <div class="invalid-feedback">
                                CPF é requerido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" placeholder="Digite seu CNPJ" value="" name="cnpj">
                            <div class="invalid-feedback">
                                CNPJ é requerido.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefone1">Telefone</label>
                            <input type="text" class="form-control" id="telefone1" placeholder="O número que o cliente irá contatar" value="" required name="telefone1">
                            <div class="invalid-feedback">
                                Telefone é requerido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefone2">Telefone
                                <span class="text-muted" >(opcional)</span>
                            </label>
                            <input type="text" class="form-control" id="cnpj" placeholder="O número que o cliente irá contatar" value="" name="telefone2">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email
                            <span class="text-muted">(Para acessar conta)</span>

                        </label>
                        <input type="email" class="form-control" id="email" placeholder="Digite um email válido" name="email">
                        <div class="invalid-feedback">
                            Email é requerido para efetuar login.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="senha">Senha
                            <span class="text-muted">(Para acessar conta)</span>
                        </label>
                        <input type="password" class="form-control" id="senha" placeholder="Insira uma senha" name="senha">
                        <div class="invalid-feedback">
                            Senha é requerida para efetuar login.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="estado">Estado</label>
                            <select class="custom-select d-block w-100" id="estado" required name="estado">
                                <option value="">Escolha...</option>
                                <option>BA</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione um estado.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade</label>
                            <select class="custom-select d-block w-100" id="cidade" required name="cidade">
                                <option value="">Escolha...</option>
                                <option>Jequié</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione uma cidade.
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Pagamento</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked >
                            <label class="custom-control-label" for="credit">Cartão de crédito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" >
                            <label class="custom-control-label" for="debit">Boleto</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" >
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Nome do cartão</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" >
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Número</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" >
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Validade</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" >
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" >
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Concorco com os
                            <a href="#">termos de uso</a>
                        </label>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg btn-block" type="submit" name="btn-assinar">Assinar por 30 dias</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2018 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#">Privacy</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">Terms</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">Support</a>
                </li>
            </ul>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';

                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
    </script>

  <!-- Modal login-->
  <form class="modal fade" id="modal_login" method="POST" action="">

        <div class="modal-dialog">
    
          <div class="modal-content fundo_inscricao">
    
            <div class="modal-header">
    
              <h5 class="modal-title" id="janelaLabel">
                Acesse sua conta
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
    
              <div class="row">
    
                <div class="form-group col-md-12">
                  <label for="email">
                    <h6>E-mail</h6>
                  </label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>
    
                <div class="form-group col-md-12">
                  <label for="senha">
                    <h6>Senha</h6>
                  </label>
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
              </div>
            </div>
    
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Entrar</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
    
          </div>
        </div>
      </form>
      <!-- /.modal -->
      
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>