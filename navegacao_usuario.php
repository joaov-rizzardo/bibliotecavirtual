<nav class="navbar navbar-expand-lg fixed-top" id="navegacao">
  <div class="container">
    <a id="logo" class="navbar-brand" href="home.php"><i class="fas fa-book-open mr-2"></i>Biblioteca virtual</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target1">
      <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="nav-target1">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Categorias</a>
          <div class="dropdown-menu" id="drop-menu">
            <a class="dropdown-item" href="#">Ficção</a>
            <a class="dropdown-item" href="#">Drama</a>
            <a class="dropdown-item" href="#">Aventura</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Suporte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Minha biblioteca</a>
        </li>
        <li class="nav-item divisor">

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?= $_SESSION['nome_usuario'] ?></a>
          <div class="dropdown-menu" id="drop-menu">
            <a class="dropdown-item" href="controla-cadastro-login.php?tipo=logoff">Sair</a>

          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>