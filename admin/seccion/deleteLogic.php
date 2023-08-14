<?php
    include('../config/conex.php');
    $id_events = $cnx->real_escape_string($_POST['id_events']);
    
    $queryD="DELETE FROM events WHERE id_events=?;";
    // preparo la consulta para evitar inyecciones sql
    $stmt = mysqli_stmt_init($cnx);
    $prepareStmt = mysqli_stmt_prepare($stmt, $queryD);
    if($prepareStmt){
        mysqli_stmt_bind_param($stmt, "s", $id_events);
        mysqli_stmt_execute($stmt);
        header('Location: ../template/dashboard.php');
    }
?>