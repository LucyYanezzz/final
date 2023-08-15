<?php
    include('../config/conex.php');
    // seleccionamos todos los eeventos y su data
    $quey="SELECT id, title, start, end, color FROM calendar";
    $res=mysqli_query($cnx, $quey);
    // los traemos en un array
    $events = [];
    while ($row = $res->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['start'],
        'end' => $row['end'],
        'color' => $row['color']
    ];
    }

    header('Content-Type: application/json');
    echo json_encode($events);


?>