<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>konsertaki - busque ou anuncie serviços prediais</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="css/contas.css">

</head>

<body>

  <!-- Navigation -->
  <header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">konsertaki</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Serviços
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">Alvenária</a>
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
              <a class="nav-link" href="contact.html">Sobre</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="card-deck mb-3 mt-3 text-center">
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Quero anunciar</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">$49,99
            <small class="text-muted">/ mo</small>
          </h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Teste por 30 dias gratuitamente.</li>
            <li>Aumente sua chance de ser contrado.</li>
            <li>Torne-se visível na internet. </li>
            <!-- <li>loremipsum</li> -->
          </ul>
          <button id="assinar" onclick="abreLink()" type="button" class="btn btn-lg btn-block btn-success">Assinar</button>
        </div>
      </div>

      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Quero contratar </h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">$0
            <small class="text-muted">/ mo</small>
          </h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Dê o feedback dos serviços contratados</li>
            <br>
            <br>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-outline-success">Criar conta grátis</button>
        </div>
      </div>

    </div>

  </div>
  </div>

  <!-- /.container -->


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

  <script>
    /* vou mudar essa porra, é sério kkk*/
    function abreLink(){
      window.location.href = 'cadastro.php';
    }

    function abreLink2(){
      window.location.href = 'contact.html';
    }

   </script>

  <!-- Footer -->
  <footer class="py-5 bg-dark" style="margin-top: 9em;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
  </footer>
   

</body>

</html>