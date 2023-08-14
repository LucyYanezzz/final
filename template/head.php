<?php $url="http://".$_SERVER['HTTP_HOST']."/integradora"; ?>
<!-- header index -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Lucia Yañez, Miguel Millan, Ramon Aguilera, Jean Lozano y David Salas">
    <meta name="description" content="Ibenteu">
    <meta name="keywords" content="Salones de eventos, eventos en Chihuahua, salones de fiestas, salon para bodas, salon en Chihuahua">
    <title>Ibenteu</title>
    <!-- logo -->
    <link rel="icon" type="image/x-icon" href="img/logoAmarillo.png">
    <!-- Css -->
    <link rel="stylesheet" href="css/styleA.css" />
    <!-- Js -->
    <script src="js/scriptIndex.js"></script>
    <!-- fonts-->
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
      integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
      crossorigin="anonymous"
    ></script>
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Iconos de Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--Biblioteca animate je-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="animate.css">
    <!--font poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap"
      rel="stylesheet"
    />
    <!--link ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  </head>
  <body>
    <!--Header Inicio-->
    <header class="hd">
      <nav
        class="navbar navbar-expand-lg bg-light fixed-top"
        style="height: 100px"
      >
        <div class=" container mb-3">
          <!--Logo-->
          <a class="navbar-brand" href="<?php echo $url; ?>">
            <img
              src="img\logoAmarillo.png"
              alt="Logo de la marca"
              class="brand-image"
              style="width: 60px"
            />
          </a>
          <a class="navbar-brand fs-4" href="<?php echo $url; ?>" style="color: #1b1a17"
            >Ibenteu</a
          >
          <!--Toggle (botonsito de 3 lineas)-->
          <button
            class="navbar-toggler shadow-none border-0"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!--Barra de al lado ja-->
          <div
            class="sidebar offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel"
          >
            <!-- Header Barra de al lado ja-->
            <div class="offcanvas-header text-dark border-bottom">
              <img
                src="img\logoAmarillo.png"
                alt="Logo de la marca"
                style="width: 60px"
              />
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Ibenteu</h5>
              <button
                type="button"
                class="btn-close btn-close-dark shadow-none"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <!--Barra de al lado (body)-->
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-4">
              <ul
                class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3"
              >
                <li class="nav-item mx-1">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="<?php echo $url; ?>"
                    >Inicio</a
                  >
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="about.php">Sobre nosotros</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="contact.php">Contactanos</a>
                </li>
              </ul>
              <hr />
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-3"
              >
                <ul>
                  <!-- dropdown-->
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                    Usuario
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a
                          style="background-color: white"
                          class="dropdown-item"
                          href="<?php echo $url;?>/public/singUpForm.php"
                          >Registrate</a
                        >
                      </li>
                      <li>
                        <a
                          style="background-color: white"
                          class="dropdown-item"
                          href="<?php echo $url; ?>/admin/template/loginForm.php"
                          >Inicia sesión</a
                        >
                      </li>
                      <hr class="dropdown-divider" />
                      <li>
                        <a
                          style="background-color: white"
                          class="dropdown-item"
                          href="salones.php"
                          >Ver salones</a
                        >
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!--Nav fin-->
     
    <!--Header Fin-->
    <br> <br>