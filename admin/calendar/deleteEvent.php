<?php
include('../config/conex.php');
$response = array();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM calendar WHERE id = '$id'";
    if (mysqli_query($cnx, $query)) {
        $response['success'] = true;
        $response['message'] = "Evento eliminado correctamente";
    } else {
        $response['success'] = false;
        $response['message'] = "Error al eliminar el evento";
    }
}
echo json_encode($response);
?>
