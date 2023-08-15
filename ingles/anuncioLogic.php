<?php
include('admin/config/conex.php');
include('template/head.php');

// traemos los datos del formulario
if(isset($_POST['anuncio'])){
    $name=$_POST['name'];
    // hacemos post de los datos
    $face=$_POST['face'];
    $insta=$_POST['insta'];
    $phone=$_POST['phone'];

      $url="http://".$_SERVER['HTTP_HOST']."/integradora";
      if(isset($_FILES['flyer'])){
          // direcotrio donde se van a subir
          $directory = 'anuncio/';
          // tmp name archivo
          $tempName1 = $_FILES['flyer']['tmp_name'];
          // name archivo
          $fileName1 = $_FILES['flyer']['name'];
          // destino
          $destiny1 = $directory . $fileName1;

          // movemos el archivo 1
          if (move_uploaded_file($tempName1, $destiny1)){
              // ruta para la bd
              $directory1=$destiny1;
          }else{
              $directory1="";
          }
  }
    // realizo el insert en la tabla de events
    $queryP="INSERT INTO `anuncios` (`id_anuncios`, `name`, `flyer`, `face`, `insta`, `phone`) VALUES (UUID(), ?, ?, ?, ?, ?);";
    // preparo la consulta para evitar inyecciones sql
    $stmt = mysqli_stmt_init($cnx);
    $prepareStmt = mysqli_stmt_prepare($stmt, $queryP);
    if($prepareStmt){
        mysqli_stmt_bind_param($stmt, "sssss", $name, $directory1, $face, $insta, $phone);
        mysqli_stmt_execute($stmt);
        // mandamos una alerta echo con sweetalerts
        echo "Advertisement published.";
        Location('salones.php');
    
    }else{
        // sweet alert de falla
       echo "An error occurred.";
       Location('anuncio.php');
    }
}   

?>