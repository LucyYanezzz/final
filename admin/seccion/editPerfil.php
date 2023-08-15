<?php
include('../config/conex.php');

// protect variables inyeccion
$id_owner = $cnx->real_escape_string($_POST['id_owner']);
$name = $cnx->real_escape_string($_POST['name']);
$lastname = $cnx->real_escape_string($_POST['lastname']);
$mail = $cnx->real_escape_string($_POST['mail']);
$phone = $cnx->real_escape_string($_POST['phone']);


// query update
$queryU = "UPDATE `owner` SET `name`=?, `lastname`=?, `mail`=?, `phone`=? WHERE id_owner=?;";
// query prepare
$stmt=mysqli_stmt_init($cnx);
$prepareStmt = mysqli_stmt_prepare($stmt, $queryU);
if($prepareStmt){
    mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $mail, $phone, $id_owner);
    mysqli_stmt_execute($stmt);
    if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] === UPLOAD_ERR_OK) {
        $tempName = $_FILES['profilePhoto']['tmp_name'];
        $fileName = $_FILES['profilePhoto']['name'];
        $uploadDir = 'uploads/';
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($tempName, $targetFilePath)) {
            // Update the profile photo path in the database
            $queryUpdatePhoto = "UPDATE `owner` SET `profilePhoto`=? WHERE id_owner=?";
            $stmtPhoto = mysqli_stmt_init($cnx);

            if (mysqli_stmt_prepare($stmtPhoto, $queryUpdatePhoto)) {
                mysqli_stmt_bind_param($stmtPhoto, "ss", $targetFilePath, $id_owner);
                mysqli_stmt_execute($stmtPhoto);
            }
        } else {
            echo "Error al cargar la nueva imagen de perfil.";
        }
    }
        echo "Perfil actualizado correctamente";
        header('Location: perfil.php');
    } else {
        // Error in the query
        echo "Error al preparar la consulta: " . mysqli_stmt_error($stmt);
    }

    ?>
    