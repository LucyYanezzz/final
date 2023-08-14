<?php

include('../config/conex.php');

// protect variables inyeccion
$id_events = $cnx->real_escape_string($_POST['id_events']);
$nameS = $cnx->real_escape_string($_POST['nameS']);
$descripS = $cnx->real_escape_string($_POST['descripS']);
$ubiS = $cnx->real_escape_string($_POST['ubiS']);
$face = $cnx->real_escape_string($_POST['face']);
$insta = $cnx->real_escape_string($_POST['insta']);
$id_owner=$_SESSION['id_owner'];

// query update
$queryU = "UPDATE `events` SET `nameS`=?, `descripS`=?, `ubiS`=?, `face`=?, `insta`=?, `id_owner`=? WHERE id_events=?;";
// query prepare
$stmt=mysqli_stmt_init($cnx);
$prepareStmt = mysqli_stmt_prepare($stmt, $queryU);
if($prepareStmt){
    mysqli_bind_param($stmt, "sssssss", $nameS, $descripS, $ubiS, $face, $insta, $id_owner, $id_events);
    mysqli_stmt_execute($stmt);
      echo "Success";
    } else {
    // error de la consulta
    echo "Error al preparar la consulta: " . $cnx->error;
    }

?>