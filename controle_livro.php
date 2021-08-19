<?php
    require 'conexao.php';
    require 'livro_classe.php';

    if(isset($_GET['acao']) && $_GET['acao'] == 'adicionar'){
        $conexao = new Conexao();
        $livro = new Livro($conexao);

        $livro->adicionaLivro($_GET['id_livro'],$_GET['id_usuario']);

        header('Location: biblioteca_usuario.php?evento=livroAdicionado');

    }else if(isset($_GET['acao']) && $_GET['acao'] == 'remover'){
        $conexao = new Conexao();
        $livro = new Livro($conexao);

        $id_livro = $_GET['id_livro'];
        $id_usuario = $_GET['id_usuario'];

        $livro->removeLivroUsuario($id_livro,$id_usuario);

        header('Location: biblioteca_usuario.php?evento=livroRemovido');
    }else if(isset($_GET['acao']) && $_GET['acao'] == 'adicionarDestaque'){
        $id_livro = $_GET['id_livro'];
        $destaque = $_GET['destaque'];
    
        $conexao = new Conexao();
        $livro = new Livro($conexao);

        $livro->adicionaRemoveDestaque($id_livro,$destaque);

        header('Location: home_admin.php?evento=adicionadoDestaques');
        
    }else if(isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
        $id_livro = $_GET['id_livro'];
        
        $conexao = new Conexao();
        $livro = new Livro($conexao);

        $livro->excluirLivro($id_livro);

        header('Location: home_admin.php?evento=livroExcluido');

    }else if(isset($_GET['acao']) && $_GET['acao'] == 'adicionarLivro'){
        $diretorioUpload = "./img/".basename($_FILES['capa']['name']);
        $titulo_livro = $_POST['titulo'];
        $autor_livro = $_POST['autor'];
        $categoria_livro = $_POST['categoria'];
        $sinopse_livro = $_POST['sinopse'];
        $capa_livro = $_FILES['capa']['name'];

        if($titulo_livro == '' || $autor_livro == '' || $categoria_livro == '' || $sinopse_livro == '' || $capa_livro == ''){
            header('Location: adicionar_livros.php?evento=errocampo');
        }else{
            $conexao = new Conexao();

            $livro = new Livro($conexao);
    
            $livro->__set('titulo_livro',$titulo_livro)->__set('autor_livro',$autor_livro)->__set('categoria_livro',$categoria_livro)->__set('sinopse_livro',$sinopse_livro)->__set('capa_livro',$capa_livro);
            if(count($livro->verificaLivro()) > 0){
                header('Location: adicionar_livros.php?evento=livroexiste');
            }else if(count($livro->verificaCapa()) > 0){
                header('Location: adicionar_livros.php?evento=capaexiste');
            }else{
                $livro->inserirLivro();
    
                move_uploaded_file($_FILES['capa']['tmp_name'],$diretorioUpload);
        
                header('Location: adicionar_livros.php?evento=livroInserido');
                
            }
        }

        
        
    }

?>