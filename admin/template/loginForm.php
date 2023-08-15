<!-- codigo del formulario de login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta datos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- titulo -->
    <title>Inicia Sesion</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../img/logoAmarillo.png">
    <!-- estilos y scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../css/styleAdmin.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/scriptt.js"></script>
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<!-- cookies de errores -->
<?php
// url del server
$url="http://".$_SERVER['HTTP_HOST']."/integradora";
// Verificar si la cookie existe
if (isset($_COOKIE['login_error'])) {
    $loginError = $_COOKIE['login_error'];
    // Eliminar la cookie para que el mensaje de alerta no se muestre de nuevo después de refrescar la página
    setcookie('login_error', '', time() - 3600, '/');
}
?>

<body>
    <!-- navbar simple -->
    <nav class="navbar navbar-light fixed-top gradient-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $url; ?>">
                <img src="../../img/1 LogoNegro.svg" alt="Logo Ibenteu" width="30" height="24">
                Ibenteu
            </a>
        </div>
    </nav>
    <!-- end navbar -->
    <br></br>
    <div class="container mt-5">
    <!-- mostrar cookies de error -->
    <?php
    // Mostrar el mensaje de alerta si existe
     if (isset($loginError)) {
        echo "<div class='alert alert-danger'>$loginError</div>";
      }
    ?>
    </div>
    <br>
    <!-- inicia section login -->
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow p-3 mb-5 bg-body rounded" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="../../img/loginPhoto.jpg"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <!-- form -->
                            <form action="login.php" method="post">
                                <!-- title -->
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión</h5>
                                <!-- mail -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-envelope-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" placeholder="Introduce tu correo electrónico:" name="mail" class="form-control" required>
                                </div>
                                </div>
                                <!-- password -->
                                <div class="d-flex flex-row aling-items-center mb-4">
                                    <i class="bi bi-lock-fill fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" placeholder="Introduce tu Contraseña:" name="password" id="password" class="form-control" required>
                                            <button type="button" name="eye" onclick="verPassword()" class="btn btn-outline-secondary">
                                            <i id="eye-icon" class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                </div>
                                <br>
                                <!-- boton submit login -->
                                <div class="pt-1 mb-4">
                                    <input type="submit" value="Inicia Sesion" name="login" class="btn btn-dark btn-lg btn-blobk">
                                </div>
                                <!-- end boton submit login -->
                            </form>
                            <!-- end form -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- boton register -->
    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mb-0 me-2">¿Aún no tienes cuenta?</p>
        <button type="button" class="btn btn-outline-danger">
            <a href="../../public/singUpForm.php" class="link-dark">
                Regístrate
            </a>
        </button>
    </div>
    <!-- end boton register -->
<!-- end section login -->

<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<!--footer-->
<div class="container-fluid fixed-bottom  footer">
  <!-- Footer -->
  <footer class="text-lg-start text-black ">
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
</div>
<!-- end body and html -->
</body>
<!-- loader -->
<div id="loader" class="loader-container">
    <img src="../../img/loadinfDEF.gif" alt="Cargando..." class="loader">
</div>
<!-- end loader -->
</html>

<script>
    window.addEventListener('load', function() {
  setTimeout(function() {
      // Oculta el indicador de carga
      document.getElementById('loader').style.display = 'none';
  }, 1000); 
});

</script>

