<?php
    // aqui verificamos que el login tenga todos los campos
     if (empty($_POST['mail']) || empty($_POST['password'])) {
        // cookie de errores
        setcookie('login_error', 'Labels empty', time() + 3600, '/');
        header("Location: loginForm.php");
        exit();
    } else {
        // hacemos post del mail y del password
        $mail = $_POST["mail"];
        $password = $_POST["password"];
        // despues requerimos la conexion
        require_once "../config/conex.php";
        // realizamos el query, en donde buscamos el mail que ingreso el usuario en la bd
        $queryL = "SELECT * FROM owner WHERE mail = '$mail'";
        $res = mysqli_query($cnx, $queryL);
        // mediante un array asociativo sacamos el resultado de la consulta
        $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if ($user) {
            // verificamos la password con la funcion password verify
            if (password_verify($password, $user["password"])) {
                // iniciamos sesion y guardamos variables de sesion
                session_start();
                $_SESSION["id_owner"] = $user['id_owner'];
                $_SESSION["name"] = $user['name'];
                $_SESSION["lastname"] = $user['lastname'];
                $_SESSION["mail"] = $user['mail'];
                $_SESSION["phone"] = $user['phone'];
                $_SESSION["profilePhoto"] = $user['profilePhoto'];
                // nos envia al dashboard
                header("Location: dashboard.php");
                die();
            } else {
                // mediante cookies envian alertas 
                setcookie('login_error', 'Password does not match', time() + 3600, '/');
                header("Location: loginForm.php");
                exit();
            }
        } else {
            setcookie('login_error', 'Email does not exist', time() + 3600, '/');
            header("Location: loginForm.php");
            exit();
        }
    }
    

?> 