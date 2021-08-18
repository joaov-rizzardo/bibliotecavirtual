<?php  
    require 'verifica_login.php';

    if($_SESSION['id_status'] != 2){
        header('Location: home.php');
    }

?>