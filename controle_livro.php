<?php
    require 'conexao.php';
    require 'livro_classe.php';

    if(isset($_GET) && $_GET['acao'] == 'adicionar'){
        $conexao = new Conexao();
        $livro = new Livro($conexao);

        $livro->adicionaLivro($_GET['id_livro'],$_GET['id_usuario']);

        header('Location: biblioteca_usuario.php?evento=livroAdicionado');

    }else if(isset($_GET) && $_GET['acao'] == 'remover'){
        $conexao = new Conexao();
        $livro = new Livro($conexao);

        $id_livro = $_GET['id_livro'];
        $id_usuario = $_GET['id_usuario'];

        $livro->removeLivroUsuario($id_livro,$id_usuario);

        header('Location: biblioteca_usuario.php?evento=livroRemovido');
    }

?>