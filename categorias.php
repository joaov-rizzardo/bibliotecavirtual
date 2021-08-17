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

       function adicionar(id_livro, id_usuario) {
            location.href = 'controle_livro.php?acao=adicionar&id_livro=' + id_livro + '&id_usuario=' + id_usuario
        }
    </script>


</head>

<body>
    <?php
    require_once('verifica_login.php');
    require_once('navegacao_usuario.php');
    require_once('conexao.php');
    require_once('livro_classe.php');
    
    $categoria = $_GET['categoria'];
    if( $categoria == 1){
        $nome_categoria = 'Ficção Científica';
    }else if($categoria == 2){
        $nome_categoria = 'Romance';
    }else if($categoria == 3){
        $nome_categoria = 'Aventura';
    }else if($categoria == 4){
        $nome_categoria = 'Infantil';
    }

    ?>
    <div style="margin-top: 95px;" class="text-white">
        <h4 class="mb-2 ml-5"><?=$nome_categoria?></h4>
    </div>
    <section  id="categorias">
        <div class="row justify-content-start">
            <?php
                $conexao = new Conexao();
                $livro = new Livro($conexao);
                $livros = $livro->recuperarLivrosCategoria($_GET['categoria']);

                foreach($livros as $livro){
            ?>
            <div  class="livro-secao col-xl-2 mr-4 ml-4 mb-4">
                    <a href="livro_detalhes.php?id_livro=<?=$livro->id_livro?>">
                        <img src="img/<?=$livro->capa_livro?>" alt="">
                        <h5><?=$livro->titulo_livro?></h5>
                        <p><?=$livro->autor_livro?></p>
                    </a>
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



</body>