<?php
    if(isset($_POST['owner'])){
        // hacemos post de los datos
        $name=$_POST['name'];
        $lastname=$_POST['lastname'];
        $mail=$_POST["mail"];
        $phone=$_POST["phone"];
        $profilePhoto=$_FILES["profilePhoto"];
        $password=$_POST["password"];
        $passwordRepeat=$_POST["repeat_password"];

        // hasheamos la contrasena
        $passwordHash = password_hash($password, PASSWORD_DEFAULT); 
        // variable para guardar los errores
        $errors = array();
        // verificar que los campos esten completos
        if (empty($name) OR empty($lastname) OR empty($mail) OR empty($phone) OR empty($password) OR empty($passwordRepeat)) {
         array_push($errors,"Se deben de rellenar todos los campos");
        }
        // validar los emails
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            array_push($errors,"Registra un email valido");
        }
        // longitud de caracteres
        if (strlen($password)<8) {
            array_push($errors,"Tu contrasena debe tener 8 caracteres minimo");
        }
        // validacion de contrasena
        if ($password!==$passwordRepeat) {
            array_push($errors,"La contrasena no coincide");
        }
        // no emails repetidos
        require_once "../admin/config/conex.php";
        $sql = "SELECT * FROM owner WHERE mail = '$mail'";
        $res = mysqli_query($cnx, $sql);
        // con esta funcion cuenta las filas que podrian tener el mismo email
        $rowCount = mysqli_num_rows($res);
        if ($rowCount>0) {
         array_push($errors,"Ese email ya esta registrado!");
        }
        // Verificar si se ha seleccionado una imagen de perfil
        if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] === UPLOAD_ERR_OK) {
        $tempName = $_FILES['profilePhoto']['tmp_name'];
        $fileName = $_FILES['profilePhoto']['name'];
        // Definir la carpeta de destino donde se almacenará la imagen de perfil
        $uploadDir ='../uploads/';
        $targetFilePath = $uploadDir . $fileName;
        // Mover el archivo temporal al directorio de destino
        if (move_uploaded_file($tempName, $targetFilePath)) {
            // La imagen se ha subido correctamente,guardo la ruta en la bd
            $directory = $targetFilePath;
        } else {
            echo "<div class='alert alert-danger'>Error al cargar la imagen de perfil.</div>";
        }
        } else {
            // El usuario no seleccionó una imagen de perfil
            $directory = 'defaultProfile.png'; 
        }
        if(isset($_FILES['ine'])){
            $pdfFile=$_FILES['ine'];
              // Verificar errores
            if ($pdfFile['error'] === UPLOAD_ERR_OK) {
            // Obtener el nombre original del archivo
            $fileName = $pdfFile['name'];
            // Mover el archivo temporal a files
            $destiny = '../files/' . $fileName;
            if (move_uploaded_file($pdfFile['tmp_name'], $destiny)) {
                // El archivo se subió correctamente, guardo en la bd
                echo "El archivo se subió correctamente.";
            } else {
                echo "Hubo un error al subir el archivo.";
            }
            } else {
                echo "Error al subir el archivo: " . $pdfFile['error'];
            }
        }
        // cuenta los posibles errores y los muestra
        if (count($errors)>0) {
            foreach($errors as $errors) {
                echo "<div class= 'alert alert-danger'>$errors</div>";
            }
        }else{
            // si no hay errores realizo la consulta
            $queryR="INSERT INTO owner (`id_owner`, `name`, `lastname`, `mail`, `phone`, `password`, `profilePhoto`, `ine`) 
            VALUES (UUID(), ?, ?, ?, ?, ?, ?, ?);";
            // preparo la consulta para evitar inyecciones sql
            $stmt = mysqli_stmt_init($cnx);
            $prepareStmt = mysqli_stmt_prepare($stmt, $queryR);
            if ($prepareStmt){
                // ahora si agrego las variables a la consulta
                mysqli_stmt_bind_param($stmt, "sssssss", $name, $lastname, $mail, $phone, $passwordHash, $directory, $destiny);
                mysqli_stmt_execute($stmt);
                // despues redirecciono a la pagina index
                header('Location: ../index.php');
                // almacenar el mensaje de alerta en una cookiee
                setcookie('alert_message', 'Se ha registrado correctamente', time() + 3600, '/');

            }else{
                die("Hubo un error");
            }
        }
    }
    
?>