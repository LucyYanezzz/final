<?php
    // destruimos la sesion para que o se pueda acceder
    session_start();
    session_destroy();
    header('Location:../../index.php');
?>