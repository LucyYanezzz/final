<?php
include('../config/conex.php');
// traemos la informacion
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$color = $_POST['color'];
$id_events = $_POST['id_events'];

// Consulta INSERT
$query = "INSERT INTO calendar (id, title, start, end, color, id_events) VALUES (UUID(), ?, ?, ?, ?, ?);";
$stmt = $cnx->prepare($query);
// consulta preparada
if ($stmt) {
  $stmt->bind_param("sssss", $title, $start, $end, $color, $id_events);
  if ($stmt->execute()) {
    echo "Evento insertado correctamente.";
  } else {
    echo "Error al insertar el evento: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error al preparar la consulta: " . $cnx->error;
}
?>

