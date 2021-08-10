<html>
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="javascript.js"></script>
     
    </head>
    
    <body>
        
    <?php require_once 'navegacao.php'; ?>

    <section id="principal" class="d-flex">
        <div class="container d-flex align-self-center justify-content-center">
            <div id="formulario-cadastro" class="d-flex justify-content-center">
                <div>
                    <h1>Faça o seu cadastro</h1>
                    <p>Já possuí uma conta? <a href="login.php">Fazer login</a></p>
                    <form action="" id="formulario-login" class="form-group">
                        <input type="text" class="form-control mb-3" placeholder="Login">
                        <input id="senha" type="password" class="form-control mb-3" placeholder="Senha">
                        <input id="senha" type="password" class="form-control mb-3" placeholder="Confirme a senha">
                        <button type="submit" class="btn btn-lg btn-warning">Cadastre-se</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer id="teste">
        olá mundo
    </footer>

    </body>
</html>