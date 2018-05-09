<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Konsertaki - busque ou anuncie serviços prediais.</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">

  <!-- WOW ANIMATION CSS -->
  <link rel="stylesheet" href="vendor/WOW-master/css/libs/animate.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


</head>

<body>

<?php

require_once('includes/header.php');

 ?>


  <!-- Page Content -->

  <!-- Carousel -->
  <div class="container">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('img/slide-1.jpg')">
          <div class="carousel-caption d-md-block caption-estilo">
            <h3>Serviços para seu Lar</h3>
            <a href="pesquisa.html" class="btn btn-success">Buscar profissionais</a>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/teste2.jpg')">
          <div class="carousel-caption  d-md-block caption-estilo">
            <h3>Anuncie seu serviço </h3>
            <a href="cadastro.html" class="btn btn-success">Cadastre-se</a>
          </div>
        </div>

        <!-- Slide Three - Set the background image for this slide in the line below -->
        <!-- <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Third Slide</h3>
                  <p>This is a description for the third slide.</p>
                </div>
              </div> -->
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- end carousel -->

    <!-- Marketing Icons Section -->
    <h1 class="my-4 text-center featurette-heading wow bounceIn">Busque profissionais em</h1>

    <div class="row servicos-icones">

      <div class="col-lg-4 wow bounceIn">
        <h2>Alvenaria</h2>
        <img class="rounded-circle icone" src="img/icons/alvenaria.png" alt="Generic placeholder image" width="140" height="140">
      </div>
      <!-- /.col-lg-4 -->

      <div class="col-lg-4 wow bounceIn">
        <h2>Pintura</h2>
        <img class="rounded-circle icone" src="img/icons/pintura.png" alt="Generic placeholder image" width="140" height="140">

      </div>
      <!-- /.col-lg-4 -->

      <div class="col-lg-4 wow bounceIn">
        <h2>Elétrica</h2>
        <img class="rounded-circle icone" src="img/icons/eletrica.png" alt="Generic placeholder image" width="140" height="140">
      </div>
      <!-- /.col-lg-4 -->

      <div class="col-lg-4 wow bounceIn">
        <h2>Hidráulica</h2>
        <img class="rounded-circle icone" src="img/icons/hidraulica.png" alt="Generic placeholder image" width="140" height="140">
      </div>
      <!-- /.col-lg-4 -->

      <div class="col-lg-4 wow bounceIn">
        <h2>Limpeza</h2>
        <img class="rounded-circle icone" src="img/icons/limpeza.png" alt="Generic placeholder image" width="140" height="140">
      </div>
      <!-- /.col-lg-4 -->

      <div class="col-lg-4 wow bounceIn">
        <h2>Jardinagem</h2>
        <img class="rounded-circle icone" src="img/icons/jardinagem.png" alt="Generic placeholder image" width="140" height="140">
      </div>
      <!-- /.col-lg-4 -->

    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>Anúncios em destaques</h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#">
            <img class="card-img-top" src="img/joao.jpg" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">João da Silva</a>
            </h4>
            <p class="card-text">Trabalho com encanamento há 8 anos. Amet Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt,
              illum tempora ex quae? Nihil, dolorem!
              <br>
              <strong>Contato: </strong>91912535
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#">
            <img class="card-img-top" src="img/teste4.jpg" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">José Nogueira</a>
            </h4>
            <p class="card-text">Trabalho com encanamento há 8 anos. Amet Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt,
              illum tempora ex quae? Nihil, dolorem!
              <br>
              <strong>Contato: </strong>91912535
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#">
            <img class="card-img-top" src="img/teste.jpg" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Maria Francisca</a>
            </h4>
            <p class="card-text">Trabalho com encanamento há 8 anos. Amet Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt,
              illum tempora ex quae? Nihil, dolorem!
              <br>
              <strong>Contato: </strong>91912535
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#">
            <img class="card-img-top" src="img/joao.jpg" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">João da Silva</a>
            </h4>
            <p class="card-text">Trabalho com encanamento há 8 anos. Amet Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt,
              illum tempora ex quae? Nihil, dolorem!
              <br>
              <strong>Contato: </strong>91912535
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#">
            <img class="card-img-top" src="img/teste4.jpg" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">José Nogueira</a>
            </h4>
            <p class="card-text">Trabalho com encanamento há 8 anos. Amet Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt,
              illum tempora ex quae? Nihil, dolorem!
              <br>
              <strong>Contato: </strong>91912535
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#">
            <img class="card-img-top" src="img/teste.jpg" alt="">
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Maria Francisca</a>
            </h4>
            <p class="card-text">Trabalho com encanamento há 8 anos. Amet Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt,
              illum tempora ex quae? Nihil, dolorem!
              <br>
              <strong>Contato: </strong>91912535
            </p>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <!-- <div class="row">
      <div class="col-lg-6">
        <h2>Modern Business Features</h2>
        <p>The Modern Business template by Start Bootstrap includes:</p>
        <ul>
          <li>
            <strong>Bootstrap v4</strong>
          </li>
          <li>jQuery</li>
          <li>Font Awesome</li>
          <li>Working contact form with validation</li>
          <li>Unstyled page elements for easy customization</li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam
          totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
      </div>
    </div> -->
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <!-- <div class="row mb-4">
      <div class="col-md-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae
          veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
      </div>
    </div>

  </div> -->
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

  <!-- WOW.JS ANIMATION -->
  <script src="vendor/WOW-master/dist/wow.min.js"></script>

  <script>
    wow = new WOW(
      {
        boxClass: 'wow',      // default
        animateClass: 'animated', // default
        offset: 0,          // default
        mobile: true,       // default
        live: true        // default
      }
    )
    wow.init();
  </script>


  <!-- Modal login-->
  <form class="modal fade" id="modal_login" method="POST" action="actions/login.php">

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
          <button type="submit" class="btn btn-success" name="btn-entrar">Entrar</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        </div>

      </div>
    </div>
  </form>
  <!-- /.modal -->

</body>



</html>