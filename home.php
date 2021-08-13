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
            if (larguraJanela > 768) {
                document.getElementById('anterior-icon').style.left = '-90px'
                document.getElementById('proximo-icon').style.right = '-90px'
            } else if (larguraJanela <= 768) {
                document.getElementById('anterior-icon').style.left = ''
                document.getElementById('proximo-icon').style.right = ''
            }
        }
    </script>


</head>

<body onload="redimensionaIcone()" onresize="redimensionaIcone()">
    <?php
    require_once('verifica_login.php');
    require_once('navegacao_usuario.php');

    ?>
    <section id="destaque">
        <div class="container">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active livro" data-interval="2000">
                        <div class="row d-flex">
                            <div class="col-md-6">
                                <img class="d-block livro" src="img/harry.jpg" alt="">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <h4>Harry potter e a pedra filosofal</h4>
                                <p>Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursleys. Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos... <a href="">Leia mais</a></p>
                                <button class="btn btn-lg btn-outline-info">Adicionar a biblioteca</button>
                            </div>


                        </div>
                    </div>

                    <div class="carousel-item livro" data-interval="2000">
                        <div class="row d-flex">
                            <div class="col-md-6">
                                <img class="d-block livro" src="img/senhor.jpg" alt="">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <h4>Harry potter e a pedra filosofal</h4>
                                <p>Harry Potter vive com os tios Dursley, onde é mal tratado até completar seus 11 anos. É com essa idade que o jovem bruxo começa a receber cartas da escola de Hogwarts... <a href="">Leia mais</a></p>
                                <button class="btn btn-lg btn-outline-info">Adicionar a biblioteca</button>
                            </div>


                        </div>
                    </div>
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

    <section id="categorias">
        <div>
        <h4 class="mb-3 ml-4 float-left">Ficção cientifica</h4>
        <a class="mb-3 mr-4 float-right" href="">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div style="clear: both;" class="row justify-content-around">
            <div class="col-lg-2 livro-secao">
                <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
        </div>
    </section>
        <hr>
        <section id="categorias">
        <div>
        <h4 class="mb-3 ml-4 float-left">Romance</h4>
        <a class="mb-3 mr-4 float-right" href="">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div style="clear: both;" class="row justify-content-around">
            <div class="col-lg-2 livro-secao">
                <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
        </div>
    </section>
    <hr>
    <section id="categorias">
        <div>
        <h4 class="mb-3 ml-4 float-left">Fantasia</h4>
        <a class="mb-3 mr-4 float-right" href="">Ver tudo <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div style="clear: both;" class="row justify-content-around">
            <div class="col-lg-2 livro-secao">
                <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
            <div class="col-lg-2 livro-secao">
            <a href="">
                    <img src="img/harry.jpg" alt="">
                    <h5>Harry potter</h5>
                </a>
            </div>
        </div>
    </section>


    <div style="height: 10000px;">

    </div>


</body>