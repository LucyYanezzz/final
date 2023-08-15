<?php
include('../config/conex.php');
// treamos datos
$id = $_POST['id']; 
$title = $_POST['title'];
$start = $_POST['start']; 
$end = $_POST['end']; 
$color = $_POST['color'];

// Consulta UPDATE para actualizar la fecha del evento en la base de datos
$query = "UPDATE calendar SET title = ?, start = ?, end = ?, color = ? WHERE id = ?";
$stmt = $cnx->prepare($query);
// consulta preparada
if ($stmt) {
  $stmt->bind_param("sssss", $title, $start, $end, $color, $id);
  if ($stmt->execute()) {
    echo "Evento actualizado correctamente.";
  } else {
    echo "Error al actualizar el evento: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error al preparar la consulta: " . $cnx->error;
}
?>
