<?php
require 'conexao.php';
require 'usuario_classe.php';

session_start();

    if($_GET['tipo'] == 'login'){
        $senha = $_POST['senha'];
        $login = $_POST['usuario'];
        
        $conexao = new Conexao();
        $usuario = new Usuario($conexao);
        $usuario->__set('usuario',$login);
        $usuario->__set('senha',$senha);

        if(count($usuario->recuperaUsuario()) == 0){
            header('Location: login.php?erro=1');
        }else{
            $usuario_array = $usuario->recuperaUsuario();
            foreach($usuario_array as $indice => $usuario){
                $senha_usuario = $usuario->senha_usuario;
                if($senha != $senha_usuario){
                    header('Location: login.php?erro=1');
                }else{
                    $_SESSION['autenticado'] = 'SIM';
                    $_SESSION['id_usuario'] = $usuario->id_usuario;
                    $_SESSION['nome_usuario'] = $usuario->nome_usuario;
                    $_SESSION['id_status'] = $usuario->id_status;

                    if($usuario->id_status == 1){
                        header('Location: home.php');
                    }else if($usuario->id_status == 2){
                        header('Location: home_admin.php');
                    }

                    
                }
            }
        }


    }else if($_GET['tipo'] == 'cadastro'){
        $senha = $_POST['senha'];
        $confirma_senha = $_POST['senha_confirma'];
        $login = $_POST['usuario'];

        if($senha != $confirma_senha){
            header('Location: cadastro.php?erro=1');
        }else{
            $conexao = new Conexao();
            $usuario = new Usuario($conexao);
            $usuario->__set('usuario',$login);
            $usuario->__set('senha',$senha);
            
            
            if(count($usuario->recuperaUsuario()) == 0){
                $usuario->cadastrar();
                header('Location: cadastro-sucesso.php');
            }else{
                header('Location: cadastro.php?erro=2');
            }
        }
        
    }else if($_GET['tipo'] == 'logoff'){
        $conexao = new Conexao();
        $usuario = new Usuario($conexao);
        $usuario->logoff();
    }
?>