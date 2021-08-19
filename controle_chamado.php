<?php
    require 'conexao.php';
    require 'chamado_classe.php';

    function instanciarChamado()
    {
        $conexao = new Conexao();
        $chamado = new Chamado($conexao);
        return $chamado;
    }

    if (isset($_GET['acao']) && $_GET['acao'] == 'enviarChamado') {
        $assunto = $_POST['assunto'];
        $id_usuario = $_GET['id_usuario'];
        $descricao = $_POST['descricao'];
        if ($_POST['categoria'] == 1) {
            $categoria = 'Problemas de conexão';
        } else if ($_POST['categoria'] == 2) {
            $categoria = 'Problemas com a conta';
        } else if ($_POST['categoria'] == 3) {
            $categoria = 'Sugestões';
        } else if ($_POST['categoria'] == 4) {
            $categoria = 'Outros';
        }

        if ($assunto == '' || $id_usuario == '' || $descricao == '' || $categoria == '') {
            header('Location: suporte.php?evento=erro');
        } else {
            $chamado = instanciarChamado();
            $chamado->__set('assunto', $assunto)->__set('id_usuario', $id_usuario)->__set('descricao', $descricao)->__set('categoria', $categoria);

            $chamado->abrirChamado();

            header('Location: suporte.php?evento=sucesso');
        }
    }else if (isset($_GET['acao']) && $_GET['acao'] == 'fecharChamado') {
        $id_chamado = $_GET['id_chamado'];
        $chamado = instanciarChamado();
        $chamado->fecharChamado($id_chamado);
        header("Location: chamado_detalhes.php?id_chamado=$id_chamado");
    }
