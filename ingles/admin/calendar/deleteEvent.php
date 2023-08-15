<?php
include('../config/conex.php');
// treamos todos los datos de la respuesta en array
$response = array();
// treamos el id del evento
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // query delete
    $query = "DELETE FROM calendar WHERE id = '$id'";
    if (mysqli_query($cnx, $query)) {
        // funcion de mensajes
        $response['success'] = true;
        $response['message'] = "Evento eliminado correctamente";
    } else {
        $response['success'] = false;
        $response['message'] = "Error al eliminar el evento";
    }
}
echo json_encode($response);
?>
