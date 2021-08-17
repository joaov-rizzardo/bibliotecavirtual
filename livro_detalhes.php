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

    $conexao = new Conexao();
    $livro = new Livro($conexao);

    if (isset($_GET['id_livro'])) {
        $id_livro = $_GET['id_livro'];
        $livroRecuperado = $livro->recuperaLivro($id_livro);
    }/*else{
        header('Location: home.php');
    }
    */

    ?>
    <div style="margin-top: 120px;" class="container">
        <section id="livro-detalhes">
            <div class="row align-self-center">
                <div class="col-lg-4 d-flex justify-content-center align-self-center">
                    <img src="img/<?= $livroRecuperado->capa_livro ?>" alt="">
                </div>

                <div class="col-lg-8 align-self-center">
                    <h1><?= $livroRecuperado->titulo_livro ?></h1>
                    <h4><?= $livroRecuperado->autor_livro ?></h4>
                    <p><?= $livroRecuperado->sinopse_livro ?></p>
                    <?php
                    $livro = new Livro($conexao);
                    $teste = $livro->verificarLivroUsuario($livroRecuperado->id_livro, $_SESSION['id_usuario']);

                    if (count($teste) == 0) {
                    ?>
                        <button onclick="adicionar('<?= $livroRecuperado->id_livro ?>','<?= $_SESSION['id_usuario'] ?>')" class="btn btn-lg btn-outline-info">Adicionar a biblioteca</button>
                    <?php } else { ?>
                        <button disabled="disabled" class="btn btn-lg btn-outline-info">Adicionado <i class="fas fa-check"></i></button>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>



</body>