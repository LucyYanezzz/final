<?php include('../template/head.php'); ?>
<?php 
$id_owner=$_SESSION['id_owner'];
// incluimos onexion
include('../config/conex.php');
// query para sacar los datos de la tabla events
$queryP = "SELECT * FROM events";
$res = mysqli_query($cnx, $queryP);
// mediante un array asociativo sacamos el resultado de la consulta
$salones = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>
<br>
<!-- inicia section publicar -->
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <!-- title section -->
            <div class="card shadow p-3 mb-3 bg-body rounded">
                <h1 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Publica tu salón</h1>
                <!-- start form -->
                <form action="publicarLogic.php" method="POST" enctype="multipart/form-data" id="multi-step-form">
                    <!-- step 1: name and description -->
                    <div class="step" id="step1">
                        <h5 class="fw-normal mb-3 pb-3 text-center">Descripción del salón</h5>
                        <div class="form-group">
                            <label for="nameS" class="form-label">Nombre del salón:</label>
                            <input type="text" name="nameS" class="form-control" id="nameS" placeholder="Nombre" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="descripS" class="form-label">Descripción:</label>
                            <input type="text" name="descripS" class="form-control" id="descripS" placeholder="Descripcion" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="ubiS" class="form-label">Ubicación:</label>
                            <input type="text" name="ubiS" class="form-control" id="ubiS" placeholder="Ubicacion" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        </div>
                        <br>
                        <!-- optional social media -->
                        <div class="form-group">
                            <label for="face" class="form-label">Facebook:</label>
                            <input type="text" name="face" class="form-control" id="face" placeholder="Enlace de Facebook">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="insta" class="form-label">Instagram:</label>
                            <input type="text" name="insta" class="form-control" id="insta" placeholder="Enlace de Instagram">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                        <button type="button"  class="btn btn-primary next-step" >Siguiente</button>
                    </div>

                        <!-- step 2 photos -->
                        <div class="step" id="step2"  style="display: none;">
                            <h5 class="fw-normal mb-3 pb-3 text-center">Sube las mejores fotos de tu salón</h5>
                            <div class="form-group">
                                <label for="img1" class="form-label">Imagen 1:</label>
                                <input type="file" name="img1" class="form-control" id="img1" required>
                                <div id="emailHelp" class="form-text">Es necesario subir mínimo una imagen del salón</div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="img2" class="form-label">Imagen 2:</label>
                                <input type="file" name="img2" class="form-control" id="img2">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="img3" class="form-label">Imagen 3:</label>
                                <input type="file" name="img3" class="form-control" id="img3">
                            </div>
                            <br>
                                <button type="button" class="btn btn-primary prev-step">Anterior</button>
                                <button type="button"  class="btn btn-primary next-step">Siguiente</button>
                        </div>

                        <!-- step 3 permitions -->
                        <div class="step" id="step3"  style="display: none;">
                            <h5 class="fw-normal mb-3 pb-3 text-center">Permisos legales</h5>
                            <div id="emailHelp" class="form-text">El apartado se pensó por motivos de seguridad, pero en esta versión no esta habilitado la subida de PDF por cuestión de espacio</div>
                            <div class="form-group">
                                <label class="form-label"for="funcionamiento">Licencia de funcionamiento:</label>
                                <input type="file" name="funcionamiento" id="funcionamiento" class="form-control" accept=".pdf" >
                                <div id="emailHelp" class="form-text">Es necesario subir sus permisos del salon en pdf por cuestiones de seguridad</div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label"for="proteccionCivil">Licencia de Protección Civil:</label>
                                <input type="file" name="proteccionCivil" id="proteccionCivil" class="form-control" accept=".pdf" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label"for="usoSuelo">Licencia de Uso de Suelo:</label>
                                <input type="file" name="usoSuelo" id="usoSuelo" class="form-control" accept=".pdf">
                            </div>
                            <br>
                            <!-- submit -->
                            <button type="button" class="btn btn-primary prev-step">Anterior</button>
                            <button type="submit" name="event" class="btn btn-success btn-rounded" onclick="return validateForm();">Agregar</button>
                        </div>
                    </form>
                <!-- end form publicar -->
                </div>
            </div>
        </div>
    </div>
    <!-- script para funcionamiento de multiform -->
    <script>
    const form = document.getElementById('multi-step-form');
    const steps = Array.from(document.getElementsByClassName('step'));

    let currentStep = 0;

    const showStep = (stepIndex) => {
      steps.forEach((step, index) => {
        if (index === stepIndex) {
          step.style.display = 'block';
        } else {
          step.style.display = 'none';
        }
      });
      currentStep = stepIndex;
    };

    const nextStep = () => {
      if (currentStep < steps.length - 1) {
        showStep(currentStep + 1);
      }
    };

    const prevStep = () => {
      if (currentStep > 0) {
        showStep(currentStep - 1);
      }
    };

    const nextBtns = document.querySelectorAll('.next-step');
    nextBtns.forEach(btn => btn.addEventListener('click', nextStep));

    const prevBtns = document.querySelectorAll('.prev-step');
    prevBtns.forEach(btn => btn.addEventListener('click', prevStep));

    showStep(currentStep); // Mostrar el primer paso al cargar la página

     // Función para validar campos obligatorios antes de enviar el formulario
      function validateForm() {
        const requiredInputs = document.querySelectorAll('input[required]');

        for (const input of requiredInputs) {
          if (!input.value.trim()) {
            Swal.fire({
              icon: 'error',
              title: 'Campos obligatorios',
              text: 'Por favor, completa todos los campos obligatorios antes de agregar el evento.',
              confirmButtonText: 'OK'
            });
            return false; // Evita enviar el formulario
          }
        }

        return true; // Puede enviar el formulario
      }
  </script>
<!-- end section publicar -->
<?php include('../template/patita.php'); ?>