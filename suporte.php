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
      
    </script>


</head>
<?php
require_once 'verifica_login.php';
require_once 'navegacao_usuario.php';
require_once 'conexao.php';
?>

<body>
    <section style="margin-top: 85px;">
    <?php if(isset($_GET['evento']) && $_GET['evento'] == 'sucesso'){ ?>
        <div id="mensagem" class="text-success">
            O chamado foi aberto com sucesso
        </div>
        <?php } ?>
        <?php if(isset($_GET['evento']) && $_GET['evento'] == 'erro'){ ?>
        <div id="mensagem" class="text-warning">
            Ocorreu um erro na abertura do chamado, por favor verifique se todos os campos foram preenchidos corretamente
        </div>
        <?php } ?>
        <div class="container" id="form">
            <h2 class="text-white mb-4">Enviar chamado de suporte</h2>
            <form method="post" action="controle_chamado.php?acao=enviarChamado&id_usuario=<?=$_SESSION['id_usuario']?>" enctype="multipart/form-data">
                <input name="assunto" type="text" placeholder="Digite o assunto do chamado" class="form-control mb-3">
                <select class="form-control mb-3" name="categoria" id="">
                    <option value="">-- Selecione a categoria do chamado --</option>
                    <option value="1">Problemas de conexão</option>
                    <option value="2">Problemas com a conta</option>
                    <option value="3">Sugestões</option>
                    <option value="4">Outros</option>
                </select>
                <textarea name="descricao" placeholder="Digite a descrição do chamado " class="form-control mb-3" name="" id="" cols="30" rows="6"></textarea>
                <button type="submit" class="btn btn-outline-info form-control">Enviar chamado</button>
            </form>
        </div>
    </section>

</body>