<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta datos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- titulo -->
    <title>Registro</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logoAmarillo.png">
    <!-- estilos y scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/scriptt.js"></script>
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="position-relative">
     <!-- navbar simple -->
     <nav class="navbar navbar-light fixed-top gradient-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $url; ?>">
                <img src="../img/1 LogoNegro.svg" alt="Logo Ibenteu" width="30" height="24">
                Ibenteu
            </a>
        </div>
    </nav>
    <!-- end navbar -->

    <br></br>
    <!-- start sing up form -->
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <!-- card -->
                <div class="card shadow p-3 mb-5 bg-body rounded" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <!-- inicia registro owner -->
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                            <!-- form -->
                            <form action="singUp.php" method="post" enctype="multipart/form-data">
                                <!-- titulo form -->
                                <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Crea tu cuenta</h2>
                                <!-- input name and icon -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-person-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="profilePhoto">Nombre:</label>
                                    <input type="text" name="name" placeholder="Nombre" class="form-control" required>
                                </div>
                                </div>
                                <!-- input lastname -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-person-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="profilePhoto">Apellido:</label>
                                    <input type="text" name="lastname" placeholder="Apellido" class="form-control" required>
                                </div>
                                </div>
                                <!-- input mail -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-envelope-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="profilePhoto">E-mail:</label>
                                    <input type="mail" name="mail" placeholder="E-mail"class="form-control"  required>
                                </div>
                                </div>
                                <!-- input phone -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-telephone-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="profilePhoto">Telefono:</label>
                                    <input type="tel" name="phone" placeholder="Telefono" class="form-control" required>
                                </div>
                                </div>
                                <!-- Campo para la imagen de perfil -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-person-bounding-box fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="profilePhoto">Imagen de Perfil:</label>
                                    <input type="file" name="profilePhoto" id="profilePhoto" class="form-control">
                                </div>
                                </div>
                                <!-- pdf ine  -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-postcard-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="ine">INE:</label>
                                    <input type="file" name="ine" id="ine" class="form-control" accept=".pdf" required>
                                    <div id="emailHelp" class="form-text">Es necesario subir su INE en pdf por cuestiones de seguridad</div>
                                </div>
                                </div>
                                <!-- input password -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-lock-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label"for="profilePhoto">Contraseña:</label>
                                    <div class="input-group">
                                    <input spellcheck="false" type="password" name="password" class="form-control" placeholder="Contraseña" id="password" required>
                                    <button type="button" name="eye" onclick="verPassword()" class="btn btn-outline-secondary">
                                        <i id="eye-icon" class="bi bi-eye"></i>
                                    </button>
                                    </div>
                                </div>
                                </div>
                                <!-- repeat password -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-lock-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label"for="profilePhoto">Repite tu contraseña:</label>
                                    <div class="input-group">
                                    <input type="password" name="repeat_password" class="form-control" placeholder="Repite tu contraseña" id="password" required>
                                        <button type="button" name="eye" onclick="verPassword()" class="btn btn-outline-secondary">
                                            <i id="eye-icon" class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                </div>
                                <!-- submit -->
                                <div class="pt-1 mb-4">
                                    <input type="submit" name="owner" value="Enviar" class="btn btn-dark btn-lg btn-block">
                                </div>
                            </form> 
                        </div>
                    </div>
                    <!-- imagen -->
                    <div class="col-md-6 col-lg-5 d-none d-md-block d-flex justify-content-center align-items-center">
                        <img src="../img/register.svg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <!-- end imagen -->
                </div>
            </div>
        </div>
    </div>
      <!-- boton login -->
      <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mb-0 me-2">¿Ya estas registrado?</p>
        <button type="button" class="btn btn-outline-danger">
            <a href="../admin/template/loginForm.php" class="link-dark">
                Login
            </a>
        </button>
    </div>
    <!-- end boton login -->
    </div>
     <!-- end register owner -->
    <!--footer-->
<div class="container-fluid fixed-bottom  footer">
  <!-- Footer -->
  <footer class="text-lg-start text-black mt-auto">
    <section class="d-flex flex-wrap p-3 b section-media">
      <!-- span de las letras del footer -->
      <div class="me-5">
        <span> © 2023 Ibenteu </span>
      </div>
      <!-- Section: Social media -->
      <div>
        <a href="" class="icon-social me-4" id="facebook">
          <i class="bx bxl-facebook-circle"></i>
        </a>
        <a href="" class="icon-social me-4" id="instagram">
          <i class="bx bxl-instagram"></i>
        </a>
        <a href="" class="icon-social me-4" id="whatsapp">
          <i class="bx bxl-whatsapp"></i>
        </a>
        <a href="" class="icon-social me-4" id="mail">
          <i class="bx bx-envelope"></i>
        </a>
      </div>
    </section>
    <!-- End section: Social media -->
  </footer>
  <!-- end footer -->
    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <?php
    // comprobamos la existencia del codigo
     if (isset($_COOKIE['alert_message'])) {
        $alertMessage = $_COOKIE['alert_message'];
        // mandamos un echo con el mensaje
        echo "<div class='alert alert-success'>$alertMessage</div>";
        // Eliminar la cookie
        setcookie('alert_message', '', time() - 3600, '/');
    }
    // incluimos la pagina del login
     include('singUp.php');
     ?>
</body>
</html>