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


        function clicka(id_livro, id_usuario) {
            console.log(id_usuario)
            console.log(id_livro)
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
    <section id="categorias">
        <div class="row justify-content-start">
            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>

            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>

            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>

            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>

            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>

            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>

            <div style="margin-top: 75px;" class="livro-secao col-xl-2 d-inline-block mr-4 ml-4">
                <div>
                    <a href="">
                        <img src="img/harry.jpg" alt="">
                        <h5>Harry potter</h5>
                        <p>Testando</p>
                    </a>
                </div>

            </div>
            

        </div>






    </section>



</body>