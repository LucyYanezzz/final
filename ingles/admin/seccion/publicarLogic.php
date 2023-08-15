<?php
include('../config/conex.php');
include('../template/head.php');

$id_events=null;

// traemos los datos del formulario
if(isset($_POST['event'])){
    $nameS=$_POST['nameS'];
    // hacemos post de los datos
    $descripS=$_POST['descripS'];
    $ubiS=$_POST['ubiS'];
    $face=$_POST['face'];
    $insta=$_POST['insta'];
    $id_owner = $_SESSION['id_owner'];
    // genera el id del event
    $id_events=uniqid();

    // realizo el insert en la tabla de events
    $queryP="INSERT INTO `events` (`id_events`, `nameS`, `descripS`, `ubiS`, `face`, `insta`, `id_owner`) VALUES (?, ?, ?, ?, ?, ?, ?);";
    // preparo la consulta para evitar inyecciones sql
    $stmt = mysqli_stmt_init($cnx);
    $prepareStmt = mysqli_stmt_prepare($stmt, $queryP);
    if($prepareStmt){
        mysqli_stmt_bind_param($stmt, "sssssss", $id_events, $nameS, $descripS, $ubiS, $face, $insta, $id_owner);
        mysqli_stmt_execute($stmt);
        // mandamos una alerta echo con sweetalerts
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Evento publicado',
                text: 'El evento se ha publicado correctamente.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../template/dashboard.php';
            });
        </script>";
    
    }else{
        // sweet alert de falla
        "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ha ocurrido un error durante la publicación del evento.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'publicar.php';
        });
        </script>";
    }
}   
    // verifica el envio de imagenes
    $url="http://".$_SERVER['HTTP_HOST']."/integradora";
    if(isset($_FILES['img1']) && isset($_FILES['img2']) && isset($_FILES['img3'])){
        // direcotrio donde se van a subir
        $directory = 'uploads/';
        // tmp name archivo
        $tempName1 = $_FILES['img1']['tmp_name'];
        $tempName2 = $_FILES['img2']['tmp_name'];
        $tempName3 = $_FILES['img3']['tmp_name'];
        // name archivo
        $fileName1 = $_FILES['img1']['name'];
        $fileName2 = $_FILES['img2']['name'];
        $fileName3 = $_FILES['img3']['name'];
        // destino
        $destiny1 = $directory . $fileName1;
        $destiny2 = $directory . $fileName2;
        $destiny3 = $directory . $fileName3;
        // movemos el archivo 1
        if (move_uploaded_file($tempName1, $destiny1)){
            // ruta para la bd
            $directory1=$destiny1;
        }else{
            $directory1="";
        }
         // movemos el archivo 2
         if (move_uploaded_file($tempName2, $destiny2)){
            // ruta para la bd
            $directory2=$destiny2;
        }else{
            $directory2="";
        }
         // movemos el archivo 1
         if (move_uploaded_file($tempName3, $destiny3)){
            // ruta para la bd
            $directory3=$destiny3;
        }else{
            $directory3="";
        }
}
    // si se sube realiza la inserccion
    $query="INSERT INTO imgevents (`id_imgEvents`, `img1`, `img2`, `img3`, `id_events`) VALUES (UUID(), ?, ?, ?, ?);";
    $stmt=mysqli_stmt_init($cnx);
    $prepareStmt=mysqli_stmt_prepare($stmt, $query);
    if($prepareStmt){
        // inserta los directorios en la base de datos
        if($id_events){
            mysqli_stmt_bind_param($stmt, "ssss", $directory1, $directory2, $directory3, $id_events);
            mysqli_stmt_execute($stmt);
            
        }else{
           
        }
        
    }else{
    
}

?>