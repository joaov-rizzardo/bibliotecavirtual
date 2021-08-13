<?php
    session_start();

    if(!isset($_SESSION) || $_SESSION['autenticado'] != 'SIM'){
        header('Location: index.php');
    }
?>