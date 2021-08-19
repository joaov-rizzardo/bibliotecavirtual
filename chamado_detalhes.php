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
        function fecharChamado(id_chamado){
            location.href = 'controle_chamado.php?acao=fecharChamado&id_chamado='+id_chamado
        }
    </script>


</head>
<?php
require_once 'verifica_login.php';
if($_SESSION['id_status'] == 2){
    require_once 'navegacao_admin.php';
}else{
    require_once 'navegacao_usuario.php';
}

require_once 'conexao.php';
require_once 'chamado_classe.php';
?>

<body>
    <section style="margin-top: 85px;">
        <div class="container">
            <?php
                $conexao = new Conexao();
                $chamadoClasse = new Chamado($conexao);

                $id_usuario = $_SESSION['id_usuario'];
                $id_status = $_SESSION['id_status'];

                $chamado = $chamadoClasse->recuperaChamado($_GET['id_chamado']);

                if($id_usuario == $chamado->id_usuario || $id_status == 2){
                    
            ?>
            <div id="chamado-detalhes">
                <div>
                    <small class="float-left"><?=$chamado->data?></small>
                    <?php if($chamado->status_chamado == 'Pendente'){ ?>
                    <small class="float-right text-success"><?=$chamado->status_chamado?></small>
                    <?php } ?>
                    <?php if($chamado->status_chamado == 'Encerrado'){ ?>
                    <small class="float-right text-danger"><?=$chamado->status_chamado?></small>
                    <?php } ?>
                </div>
                <div style="clear:both;" class="mb-2"></div>
                <h5><?=$chamado->assunto_chamado?></h5>
                <p><?=$chamado->nome_usuario?></p>
                <p><?=$chamado->categoria_chamado?></p>
                <p><?=$chamado->descricao_chamado?></p>
                <?php if($id_status == 2){ 
                    if($chamado->status_chamado == 'Pendente'){
                ?>
                <button onclick="fecharChamado(<?=$chamado->id_chamado?>)" style="width: 100%;" class="btn btn-outline-danger">Fechar chamado</button>
                <?php }} ?>
            </div>
            <?php } else{
                header('Location: consultar_chamados.php');
            }

            ?>
            
            
        </div>
    </section>

</body>