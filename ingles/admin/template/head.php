<?php 
    // inicia la sesion para que solo los registrados puedan acceder
    session_start();
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION["id_owner"])) {
    // Si no ha iniciado sesión, redirigir al inicio de sesión
        header("Location: login.php");
        exit(); // detenemos la ejecucion de código
        // eliminamos el cache para que no se quede guardado el user
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
    }
?>
<!-- header -->
<!DOCTYPE html>
<html>
  <head>
    <!-- meta datos -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Lucia Yañez, Miguel Millan, Ramon Aguilera, Jean Lozano y David Salas">
    <meta name="description" content="Ibenteu">
    <meta name="keywords" content="Salones de eventos, eventos en Chihuahua, salones de fiestas, salon para bodas, salon en Chihuahua"">
    <!-- titulo -->
    <title>Administrator</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../img/logoAmarillo.png">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Iconos de Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- estilos -->
    <link rel="stylesheet" href="../../css/styleAdmin.css" />
    <!-- seetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- script js -->
    <script type="text/javascript" src="../../js/scripty.js"></script>
    <!-- google fonts -->
  </head>
  <body id="body-pd">
    <!-- url del server -->
    <?php $url="http://".$_SERVER['HTTP_HOST']."/integradora"?>
    <header class="header" id="header">
      <!-- icono para abrir sidebar -->
      <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
    </header>
    <!-- inicia la sidebar -->
    <div class="l-navbar " id="nav-bar"> 
      <nav class="nav ">
        <!-- sidebar -->
        <aside class="col-lg-3" >
          <!-- el logo te manda a la index -->
          <a href="<?php echo $url; ?>" class="nav_logo">
            <!-- foto del logo -->
            <div class="logo_img">
              <img src="../../img/1 LogoNegro.svg" alt="Logo" />
            </div>
            <!-- nombre app -->
            <span class="nav_logo-name">Ibenteu</span>
          </a>
          <!-- lista de sidebar -->
          <div class="nav_list">
            <a href="<?php echo $url; ?>/ingles//admin/template/dashboard.php" class="nav_link">
              <i class="bx bx-home nav_icon"></i>
              <span class="nav_name">Administrator</span>
            </a>
            <a href="<?php echo $url; ?>/ingles/admin/seccion/publicar.php" class="nav_link">
              <i class="bx bx-list-plus nav_icon"></i>
              <span class="nav_name">Publish</span>
            </a>
            <a href="<?php echo $url; ?>ingles/admin/seccion/perfil.php" class="nav_link" >
              <i class="bx bxs-user nav_icon"></i>
              <span class="nav_name">Profile</span>
            </a>
            <a href="<?php echo $url; ?>ingles/admin/calendar/calendar.php" class="nav_link" >
              <i class="bi bi-calendar-check-fill nav_icon"></i>
              <span class="nav_name">Calendar</span>
            </a>
            <a href="<?php echo $url; ?>ingles/admin/seccion/logOut.php" class="nav_link">
             <i class="bx bx-log-out nav_icon" id="log_out"></i>
              <span class="nav_name">Log Out</span>              
            </a>   
            <!-- end lista sidebar -->
        </aside> 
        <!--end sidebar-->
      </nav>
    </div>
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
