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
        function adicionaRemoveDestaque(id_livro, destaque) {
            location.href = 'controle_livro.php?acao=adicionarDestaque&id_livro=' + id_livro + '&destaque=' + destaque
        }

        function excluirLivro(id_livro) {
            location.href = 'controle_livro.php?acao=excluir&id_livro=' + id_livro;
        }
    </script>


</head>
<?php
require_once 'verifica_login_admin.php';
require_once 'navegacao_admin.php';
require_once 'conexao.php';
require_once 'livro_classe.php';
?>

<body>
    <section style="margin-top: 85px;" id="categorias">
        <?php if (isset($_GET['evento']) && $_GET['evento'] == 'livroExcluido') { ?>
            <div id="mensagem" class="text-success">
                O livro foi removido do banco de dados
            </div>
        <?php } ?>
        <?php if (isset($_GET['evento']) && $_GET['evento'] == 'adicionadoDestaques') { ?>
            <div id="mensagem" class="text-success">
                O livro foi adicionado aos destaques
            </div>
        <?php } ?>


            <h4 class="mb-3 ml-4">Lista de livros</h4>
        <div class="row">
            <?php
            $conexao = new Conexao();

            $livro = new Livro($conexao);

            $livros = $livro->recuperarTodosLivros();
            foreach ($livros as $livro) {

            ?>
                <div class="col-xl-2 livro-secao mr-4 ml-4 mb-5">
                    <div>
                        <a href="livro_detalhes.php?id_livro=<?= $livro->id_livro ?>">
                            <img src="img/<?= $livro->capa_livro ?>" alt="">
                            <h5><?= $livro->titulo_livro ?></h5>
                            <p><?= $livro->autor_livro ?></p>
                        </a>
                    </div>
                    <?php
                    if ($livro->destaque == 0) {
                    ?>
                        <button onclick="adicionaRemoveDestaque('<?= $livro->id_livro ?>',1)" class="btn btn-outline-info mb-3">Adicionar aos destaques</button>
                    <?php } else if ($livro->destaque == 1) { ?>
                        <button onclick="adicionaRemoveDestaque('<?= $livro->id_livro ?>',0)" class="btn btn-outline-primary mb-3">Remover dos destaques</button>
                    <?php } ?>
                    <button onclick="excluirLivro('<?= $livro->id_livro ?>')" class="btn btn-outline-danger">Deletar livro</button>
                </div>
            <?php } ?>
        </div>
    </section>

</body>