<?php
require_once("includes/conexao.php");
session_start();

$dados_freelancer = array();
$dados_anuncio = array();

?>


<?php

function eh_freelancer($email) {
    global $connect;
    $sql = "SELECT id FROM freelancers WHERE usuarios_email = '$email';";
    $resultado = mysqli_query($connect,$sql);
    if(mysqli_num_rows($resultado) > 0) {
        return true;
    }
    return false;
}



?>

<?php
if($_SESSION['logado'] == true && eh_freelancer($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM freelancers WHERE usuarios_email = '$email';";
    $resultado = mysqli_query($connect,$sql);
    if(mysqli_num_rows($resultado) > 0) {
        $dados_freelancer = mysqli_fetch_array($resultado);

        $anuncio_id = $dados_freelancer['anuncio_id'];
        $sql = "SELECT id,titulo_anuncio,descricao,imagem FROM anuncios WHERE id = '$anuncio_id'; ";
        $dados = mysqli_query($connect, $sql);
        $dados_anuncio = mysqli_fetch_array($dados);
        //echo $dados_freelancer['nome'];

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
<?php

require_once('includes/header.php');

 ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Olá, <?php echo $dados_freelancer['nome']; ?>
        </h1>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#anuncio" role="tab" aria-controls="home" aria-selected="true">Anúncio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#editarAnuncio" role="tab" aria-controls="profile" aria-selected="false">Edição</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#assinatura" role="tab" aria-controls="contact" aria-selected="false">Assinatura</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="anuncio" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <!-- Post Content Column -->
                    <div class="col-lg-8">
                        <div class="card ">
                            <a href="#">
                                <img class="card-img-top" src="imgs-anuncios/<?php echo $dados_anuncio['imagem'];?>" alt="">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php

                                     $anuncio_id = $dados_freelancer['anuncio_id'];
                                     $sql = "SELECT * FROM anuncios WHERE id = '$anuncio_id;'";
                                     $resultado = mysqli_query($connect,$sql);
                                     if(mysqli_num_rows($resultado) > 0):
                                         $dados_anuncio = mysqli_fetch_array($resultado);
                                         //echo $dados['titulo_anuncio'];


                                     ?>

                                    <a href="#"> <?php echo $dados_anuncio['titulo_anuncio']; ?> </a>
                                </h4>
                                <p class="card-text">
                                    <?php

                                     // $anuncio_id = $dados['anuncio_id'];
                                     // $sql = "SELECT * FROM anuncios WHERE id = '$anuncio_id;";
                                     // $resultado = mysqli_query($connect,$sql);
                                     // if(mysqli_num_rows($resultado) > 0):
                                     //     $dados = mysqli_fetch_array($resultado);
                                         echo $dados_anuncio['descricao'];

                                      endif;

                                     ?>
                                 </p>
                            </div>
                        </div>
                        <hr>


                        <!-- Comments Form -->
                        <div class="card my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>

                        <!-- Single Comment -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Ana Júlia</h5>
                                Não tenho do que reclamar, ótimo profissional. Sempre solícito e atencioso.
                            </div>
                        </div>

                        <!-- Comment with nested comments -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Guilherme Estebão</h5>
                                Além de competente faz um preço camarada, indico o João para aqueles precisam de um serviço de encamento bom e com excelente
                                custo benefício.
                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">João Encanador</h5>
                                        Obrigado, Guilherme. Tenha um ótimo dia.
                                    </div>
                                </div>

                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">John Galt</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                        vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                        Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Sidebar Widgets Column -->
                    <div class="col-md-4">
                        <h5>Expiração do Anúncio</h5>
                        <!-- Progress Widget -->
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>

                        <!-- Side Widget -->
                        <div class="card my-4">
                            <h5 class="card-header">Notificação</h5>
                            <div class="card-body">
                                You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="card my-4">
                            <h5 class="card-header">Visualização</h5>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <h5>0 visualizações</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="tab-pane fade" id="editarAnuncio" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <img class="img-fluid" src="imgs-anuncios/<?php echo $dados_anuncio['imagem'];?>" alt="">
                        <form action="actions/enviar_imagem.php" enctype="multipart/form-data" method="POST">
                            <input type="hidden" value="<?php echo $dados_freelancer['anuncio_id']; ?>" name="anuncio_id">
                            <input type="file" name="anuncio-foto" accept="image/*">
                            <input type="submit" value="Enviar imagem" name="btn-enviar">
                        </form>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Edite seu anúncio</h4>
                        

                        <form class="needs-validation" novalidate action="actions/salvar_anuncio.php" method="POST">

                            <div class="row">
                                <div class="col-md-10 mb-3">

                                    <div class="col-md-6 mb-3">
                                        <label for="titulo">Título do Anúncio</label>
                                        <input type="text" class="form-control" id="titulo" placeholder="Título do seu Anúncio" value="<?php echo $dados_anuncio['titulo_anuncio']; ?>" required name="titulo_anuncio">
                                        <div class="invalid-feedback">
                                            Título é requerido.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descricao">Anúncio</label>
                                        <textarea type="text" class="form-control" id="descricao" placeholder="O que você faz? Conte mais sobre você." name="descricao"><?php echo $dados_anuncio['descricao']; ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefone1">Telefone</label>
                                    <input type="text" class="form-control" id="telefone1" placeholder="O número que o cliente irá contatar" value="<?php echo $dados_freelancer['telefone1']; ?>" required name="telefone1">
                                    <div class="invalid-feedback">
                                        Telefone é requerido.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefone2">Telefone
                                        <span class="text-muted">(opcional)</span>
                                    </label>
                                    <input type="text" class="form-control" id="cnpj" placeholder="O número que o cliente irá contatar" value="<?php echo $dados_freelancer['telefone2']; ?>" name="telefone2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="estado">Estado</label>
                                    <select class="custom-select d-block w-100" id="estado" name="estado" required>
                                        <option value="">Escolha...</option>
                                        <?php if($dados_freelancer['estado'] == 'BA'):?>
                                         <option selected>Bahia</option>
                                     <?php endif; ?>
                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        Selecione um estado.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cidade">Cidade</label>
                                    <select class="custom-select d-block w-100" id="estado" name="cidade" required>
                                        <option value="">Escolha...</option>
                                        <?php if($dados_freelancer['cidade'] == 'Jequié'):?>
                                         <option selected>Jequié</option>
                                     <?php endif; ?>
                                 </select>
                                    <div class="invalid-feedback">
                                        Selecione uma cidade.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <button class="btn btn-success btn-lg btn-block" type="submit" name="btn-salvar">Salvar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>




    <div class="tab-pane fade" id="assinatura" role="tabpanel" aria-labelledby="contact-tab">Assinatura.</div>


    <!--/.tab-content-->

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

</body>

</html>

<?php

    }
    
} else {
    header('Location: index.php');
}

?>
