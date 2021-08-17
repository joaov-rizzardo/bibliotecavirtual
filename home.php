<html>

<head>
    <meta charset="utf-8">
    <title>Biblioteca</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer>
        function redimensionaIcone() {
            let larguraJanela = window.innerWidth
            if (larguraJanela > 760) {
                document.getElementById('anterior-icon').style.left = '-90px'
                document.getElementById('proximo-icon').style.right = '-90px'
            } else if (larguraJanela <= 760) {
                document.getElementById('anterior-icon').style.left = ''
                document.getElementById('proximo-icon').style.right = ''
            }
        }


        function adicionar(id_livro, id_usuario) {
            location.href = 'controle_livro.php?acao=adicionar&id_livro=' + id_livro + '&id_usuario=' + id_usuario
        }
    </script>


</head>

<body onload="redimensionaIcone()" onresize="redimensionaIcone()">
    <?php
    require_once('verifica_login.php');
    require_once('navegacao_usuario.php');
    require('conexao.php');
    require_once('livro_classe.php');
    ?>
    <section id="destaque">
        
        <div class="container">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $conexao = new Conexao();

                    $livro = new Livro($conexao);

                    $livroDestaque = $livro->recuperarLivrosDestaque();

                    ?>
                    <div class="carousel-item active livro" data-interval="2000">
                        <div class="row d-flex">
                            <div class="col-md-6">
                                <img class="d-block livro" src="img/<?= $livroDestaque[0]->capa_livro ?>" alt="">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <h4><?= $livroDestaque[0]->titulo_livro ?></h4>
                                <p><?= $livroDestaque[0]->sinopse_livro ?> <a href="livro_detalhes.php?id_livro=<?=$livroDestaque[0]->id_livro?>">Leia mais</a></p>
                                <?php
                                $livro = new Livro($conexao);
                                $teste = $livro->verificarLivroUsuario($livroDestaque[0]->id_livro, $_SESSION['id_usuario']);

                                if (count($teste) == 0) {
                                ?>
                                    <button onclick="adicionar('<?= $livroDestaque[0]->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-lg btn-outline-info">Adicionar a biblioteca</button>
                                <?php } else { ?>
                                    <button disabled="disabled" class="btn btn btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                                <?php } ?>
                            </div>


                        </div>
                    </div>
                    <?php
                    $livro = new Livro($conexao);

                    $livros = $livro->recuperarLivrosDestaque();
                    $i = 0;
                    foreach ($livros as $livro) {
                        if ($i == 0) {
                            $i++;
                            continue;
                        }
                    ?>
                        <div class="carousel-item livro" data-interval="2000">
                            <div class="row d-flex">
                                <div class="col-md-6">
                                    <img class="d-block livro" src="img/<?= $livro->capa_livro ?>" alt="">
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <h4><?= $livro->titulo_livro ?></h4>
                                    <p><?= $livro->sinopse_livro ?> <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">Leia mais</a></p>
                                    <?php
                                    $livro1 = new Livro($conexao);
                                    $teste = $livro1->verificarLivroUsuario($livro->id_livro, $_SESSION['id_usuario']);

                                    if (count($teste) == 0) {
                                    ?>
                                        <button onclick="adicionar('<?= $livro->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-lg btn-outline-info">Adicionar a biblioteca</button>
                                    <?php } else { ?>
                                        <button disabled="disabled" class="btn btn btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

                <a class="carousel-control-prev" id="anterior-icon" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <i style="color:white;" class="fas fa-angle-left fa-3x" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a id="proximo-icon" class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <i style="color:white;" class="fas fa-angle-right fa-3x" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <hr>
    <section id="categorias">
        <div>
            <h4 class="mb-3 ml-4 float-left">Ficção cientifica</h4>
            <a class="mb-3 mr-4 float-right" href="categorias.php?categoria=1">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>

        <div style="clear: both;" class="row justify-content-around">
            <?php
            $conexao = new Conexao();

            $livro = new Livro($conexao);

            $livros = $livro->recuperarLivrosCategoria(1);
            $i = 1;
            foreach ($livros as $livro) {
                if ($i > 5) {
                    break;
                }
                $i++;
            ?>
                <div class="col-xl-2 livro-secao">
                    <div>
                        <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">
                            <img src="img/<?= $livro->capa_livro ?>" alt="">
                            <h5><?= $livro->titulo_livro ?></h5>
                            <p><?= $livro->autor_livro ?></p>
                        </a>
                    </div>
                    <?php
                    $livro1 = new Livro($conexao);
                    $teste = $livro1->verificarLivroUsuario($livro->id_livro, $_SESSION['id_usuario']);

                    if (count($teste) == 0) {
                    ?>
                        <button onclick="adicionar('<?= $livro->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-outline-info">Adicionar a biblioteca</button>
                    <?php } else { ?>
                        <button disabled="disabled" class="btn btn btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <hr>
    <section id="categorias">
        <div>
            <h4 class="mb-3 ml-4 float-left">Romance</h4>
            <a class="mb-3 mr-4 float-right" href="categorias.php?categoria=2">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>

        <div style="clear: both;" class="row justify-content-around">
            <?php
            $conexao = new Conexao();

            $livro = new Livro($conexao);

            $livros = $livro->recuperarLivrosCategoria(2);
            $i = 1;
            foreach ($livros as $livro) {
                if ($i > 5) {
                    break;
                }
                $i++;
            ?>
                <div class="col-xl-2 livro-secao">
                    <div>
                        <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">
                            <img src="img/<?= $livro->capa_livro ?>" alt="">
                            <h5><?= $livro->titulo_livro ?></h5>
                            <p><?= $livro->autor_livro ?></p>
                        </a>
                    </div>
                    <?php
                    $livro1 = new Livro($conexao);
                    $teste = $livro1->verificarLivroUsuario($livro->id_livro, $_SESSION['id_usuario']);

                    if (count($teste) == 0) {
                    ?>
                        <button onclick="adicionar('<?= $livro->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-outline-info">Adicionar a biblioteca</button>
                    <?php } else { ?>
                        <button disabled="disabled" class="btn btn btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <hr>
    <section id="categorias">
        <div>
            <h4 class="mb-3 ml-4 float-left">Aventura</h4>
            <a class="mb-3 mr-4 float-right" href="categorias.php?categoria=3">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>

        <div style="clear: both;" class="row justify-content-around">
            <?php
            $conexao = new Conexao();

            $livro = new Livro($conexao);

            $livros = $livro->recuperarLivrosCategoria(3);
            $i = 1;
            foreach ($livros as $livro) {
                if ($i > 5) {
                    break;
                }
                $i++;
            ?>
                <div class="col-xl-2 livro-secao">
                    <div>
                        <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">
                            <img src="img/<?= $livro->capa_livro ?>" alt="">
                            <h5><?= $livro->titulo_livro ?></h5>
                            <p><?= $livro->autor_livro ?></p>
                        </a>
                    </div>
                    <?php
                    $livro1 = new Livro($conexao);
                    $teste = $livro1->verificarLivroUsuario($livro->id_livro, $_SESSION['id_usuario']);

                    if (count($teste) == 0) {
                    ?>
                        <button onclick="adicionar('<?= $livro->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-outline-info">Adicionar a biblioteca</button>
                    <?php } else { ?>
                        <button disabled="disabled" class="btn btn btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <hr>
    <section id="categorias">
        <div>
            <h4 class="mb-3 ml-4 float-left">Infantil</h4>
            <a class="mb-3 mr-4 float-right" href="categorias.php?categoria=4">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>

        <div style="clear: both;" class="row justify-content-around">
            <?php
            $conexao = new Conexao();

            $livro = new Livro($conexao);

            $livros = $livro->recuperarLivrosCategoria(4);
            $i = 1;
            foreach ($livros as $livro) {
                if ($i > 5) {
                    break;
                }
                $i++;
            ?>
                <div class="col-xl-2 livro-secao">
                    <div>
                        <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">
                            <img src="img/<?= $livro->capa_livro ?>" alt="">
                            <h5><?= $livro->titulo_livro ?></h5>
                            <p><?= $livro->autor_livro ?></p>
                        </a>
                    </div>
                    <?php
                    $livro1 = new Livro($conexao);
                    $teste = $livro1->verificarLivroUsuario($livro->id_livro, $_SESSION['id_usuario']);

                    if (count($teste) == 0) {
                    ?>
                        <button onclick="adicionar('<?= $livro->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-outline-info">Adicionar a biblioteca</button>
                    <?php } else { ?>
                        <button disabled="disabled" class="btn btn btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <hr>

</body>