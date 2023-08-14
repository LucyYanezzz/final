<?php
    include('../config/conex.php');

    $quey="SELECT id, title, start, end, color FROM calendar";
    $res=mysqli_query($cnx, $quey);
    
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