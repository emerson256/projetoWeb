<?php

require_once("includes/conexao.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Konsertaki</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>


<?php include_once("includes/header.php"); ?>

    <!-- Page Content -->
    <div class="container">
        <?php

         if(isset($_GET['categoria'])):
            $categoria = $_GET['categoria'];

            ?>

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><?php echo $categoria ; ?>
            <!-- <small>Subheading</small> -->
        </h1>

        <div class="row">
            <?php 
                $sql = "SELECT id FROM servicos WHERE nome = '$categoria'; ";
                $resultado = mysqli_query($connect, $sql);
                $resultado = mysqli_fetch_array($resultado);

                $id_servico = $resultado['id'];

                $sql = "SELECT id,nome,anuncio_id FROM freelancers WHERE servico_id = '$id_servico'; ";
                $resultado = mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado) > 0):

                    while($freelancers = mysqli_fetch_array($resultado)):
                        $anuncio_id = $freelancers['anuncio_id'];
                        $sql = "SELECT id,titulo_anuncio,descricao,imagem FROM anuncios WHERE id = '$anuncio_id'; ";
                        $dados = mysqli_query($connect, $sql);
                        $anuncio = mysqli_fetch_array($dados);


             ?>

            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#">
                        <img class="card-img-top" src="imgs-anuncios/<?php echo $anuncio['imagem']; ?>" alt="">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#" class="text-success"><?php echo $anuncio['titulo_anuncio']; ?></a>

                        </h4>
                        <p class="card-text"><?php echo $anuncio['descricao']; ?>
                            <br>
<!--                             <strong>Contato: </strong>91912535 -->
                        </p>
                    </div>
                </div>
            </div>
                <?php endwhile;?>
             <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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


</body>

</html>