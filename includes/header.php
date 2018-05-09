<?php
//session_start();
require_once("conexao.php");

 ?>

  <header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">konsertaki</a>
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
                <?php
                 $sql = "SELECT * FROM servicos";
                 $resultado = mysqli_query($connect,$sql);
                 if(mysqli_num_rows($resultado) > 0):
                 while($dados = mysqli_fetch_array($resultado)):

                 ?>

                <a class="dropdown-item" href="alvenaria.html"><?php echo $dados['nome'] ?></a>
<!--                 <a class="dropdown-item" href="portfolio-2-col.html">Elétrica</a>
                <a class="dropdown-item" href="portfolio-3-col.html">Hidráulica</a>
                <a class="dropdown-item" href="portfolio-4-col.html">Jardinagem</a>
                <a class="dropdown-item" href="portfolio-item.html">Limpeza</a> -->
                <?php
                 endwhile;
               endif;
                 ?>
              </div>
            </li>
            <li class="nav-item">
              <?php

                if(!isset($_SESSION['logado'])):
               ?>
                 <a class="nav-link" href="contas.php">Criar conta</a>
             

            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#modal_login">Entrar</a>
            </li>
            <?php
            endif;
             ?>
            <?php

            if(isset($_SESSION['logado'])):
              if($_SESSION['nivel_acesso'] == '1'):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="painelFreelancer.php">Painel</a>
                </li>

        
                <?php 
                endif;
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="actions/logout.php">Sair</a>
                </li>
<!-- 
                <li class="nav-item">
                    <a class="nav-link" href="#">Olá, <?php //echo $_SESSION['nome']; ?></a>
                </li>
 -->
            <?php 
             endif;
            ?>

            <li class="nav-item">
              <a class="nav-link" href="#">Sobre</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>