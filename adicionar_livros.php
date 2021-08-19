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
    <section style="margin-top: 85px;" class="d-flex">
    <?php if (isset($_GET['evento']) && $_GET['evento'] == 'errocampo') { ?>
            <div id="mensagem" class="text-warning">
                Todos os campos devem ser preenchidos
            </div>
        <?php } ?>
        <?php if (isset($_GET['evento']) && $_GET['evento'] == 'livroInserido') { ?>
            <div id="mensagem" class="text-success">
                O livro foi inserido com sucesso
            </div>
        <?php } ?>
        <?php if (isset($_GET['evento']) && $_GET['evento'] == 'livroexiste') { ?>
            <div id="mensagem" class="text-warning">
                Um livro com esse titulo já foi cadastrado
            </div>
        <?php } ?>
        <?php if (isset($_GET['evento']) && $_GET['evento'] == 'capaexiste') { ?>
            <div id="mensagem" class="text-warning">
                Uma imagem com esse nome já existe no banco de dados, por favor renomeie o arquivo
            </div>
        <?php } ?>
        <div class="container" id="form">
            <h2 class="text-white mb-4">Formulário para inserção de livros</h2>
            <form method="post" action="controle_livro.php?acao=adicionarLivro" enctype="multipart/form-data">
                <input name="titulo" type="text" placeholder="Digite o titúlo do livro" class="form-control mb-3">
                <input name="autor" type="text" placeholder="Digite o nome do autor do livro" class="form-control mb-3">
                <select class="form-control mb-3" name="categoria" id="">
                    <option value="">-- Selecione a categoria --</option>
                    <option value="1">Ficção Científica</option>
                    <option value="2">Romance</option>
                    <option value="3">Aventura</option>
                    <option value="4">Infantil</option>
                </select>
                <textarea name="sinopse" placeholder="Digite a sinopse do livro" class="form-control mb-3" name="" id="" cols="30" rows="6"></textarea>
                <label class="form-control mb-3" for="capa">Selecione a capa do livro (tamanho recomendado 320x450)</label>
                <input accept=".png, .jpg" name="capa" id="capa" type="file" class="form-control mb-3">
                <button type="submit" class="btn btn-outline-info form-control">Inserir livro</button>
            </form>
        </div>
    </section>

</body>