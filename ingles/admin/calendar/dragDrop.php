<<?php
include('../config/conex.php');
// traemos los datos
$id = $_POST['id']; 
$start = $_POST['start']; 
$end = $_POST['end']; 
// Consulta UPDATE para actualizar la fecha del evento en la base de datos
$query = "UPDATE calendar SET start = ?, end = ? WHERE id = ?";
$stmt = $cnx->prepare($query);
// consulta preparada
if ($stmt) {
  $stmt->bind_param("sss", $start , $end, $id);
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