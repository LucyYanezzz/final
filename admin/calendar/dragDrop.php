<<?php
include('../config/conex.php');

$id = $_POST['id']; 
$start = $_POST['start']; // Nueva fecha de inicio del evento
$end = $_POST['end']; // Nueva fecha de inicio del evento


// Consulta UPDATE para actualizar la fecha del evento en la base de datos
$query = "UPDATE calendar SET start = ?, end = ? WHERE id = ?";
$stmt = $cnx->prepare($query);

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