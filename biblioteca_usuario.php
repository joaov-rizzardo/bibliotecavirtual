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
       function removeLivro(id_livro, id_usuario){
            location.href = 'controle_livro.php?acao=remover&id_livro='+id_livro+'&id_usuario='+id_usuario
       }
    </script>


</head>

<body>
    <?php
    require_once('verifica_login.php');
    require_once('navegacao_usuario.php');
    require_once('conexao.php');
    require_once('livro_classe.php');
    ?>
    <div style="margin-top: 95px;" class="text-white">
        <h4 class="mb-2 ml-4">Biblioteca pessoal</h4>
    </div>
    <hr>
    <section id="categorias">
       <?php if(isset($_GET['evento']) && $_GET['evento'] == 'livroRemovido'){ ?>
        <div id="mensagem" class="text-success">
            O livro foi removido de sua biblioteca
        </div>
        <?php } ?>
        <?php if (isset($_GET['evento']) && $_GET['evento'] == 'livroAdicionado') { ?>
            <div id="mensagem" class="text-success">
                O livro foi adicionado em sua biblioteca
            </div>
        <?php } ?>
        <div class="row justify-content-start">
            <?php
                $conexao = new Conexao();
                $livro = new Livro($conexao);
                $livros = $livro->recuperarLivrosUsuario($_SESSION['id_usuario']);

                foreach($livros as $livro){
            ?>
            <div  class="livro-secao col-xl-2 d-inline-block mr-4 ml-4 mb-4">
                    <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">
                        <img src="img/<?=$livro->capa_livro?>" alt="">
                        <h5><?=$livro->titulo_livro?></h5>
                        <p><?=$livro->autor_livro?></p>
                    </a>
                    <button onclick="removeLivro(<?=$livro->id_livro?>,<?=$_SESSION['id_usuario']?>)" class="btn btn btn-outline-info">Remover livro</button>
            </div>
            
            <?php } ?>          

        </div>
    </section>



</body>