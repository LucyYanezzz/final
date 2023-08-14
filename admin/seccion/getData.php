<?php
    include('../config/conex.php');
    // protego id de inyeccion sql
    $id_events = $cnx->real_escape_string($_POST['id_events']);

    $query = "SELECT id_events, nameS, descripS, ubiS, face, insta, id_owner FROM events WHERE id_events = ?";
    $stmt = mysqli_stmt_init($cnx);
    // preparo la consulta
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $id_events);
        mysqli_stmt_execute($stmt);
        // junto los parametros
        mysqli_stmt_bind_result($stmt, $id_events, $nameS, $descripS, $ubiS, $face, $insta, $id_owner); 

        if (mysqli_stmt_fetch($stmt)) {
            $salon = array(
                'id_events' => $id_events,
                'nameS' => $nameS,
                'descripS' => $descripS,
                'ubiS' => $ubiS,
                'face' => $face,
                'insta' => $insta,
                'insta' => $insta,
                'id_owner' => $id_owner,
            );

            echo json_encode($salon, JSON_UNESCAPED_UNICODE);
        } else {
            // si no se encuentra, mada un json vacio
            echo json_encode(array(), JSON_UNESCAPED_UNICODE); 
        }

        mysqli_stmt_close($stmt);
    } else {
        // si hay error, manda json vacio
        echo json_encode(array(), JSON_UNESCAPED_UNICODE); 
    }
?>