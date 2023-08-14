<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../css/styleAdmin.css" />
<div class="container-fluid fixed-bottom bg-light footer">
  <!-- Footer -->
  <footer class="text-lg-start text-black fixed-bottom ">
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

<!-- logica de carga -->
<script>
window.addEventListener('load', function() {
    setTimeout(function() {
        // Oculta el indicador de carga
        document.getElementById('loader').style.display = 'none';
    }, 1000); // Cambia 1000 a la cantidad de milisegundos que deseas que el indicador se muestre antes de desaparecer (por ejemplo, 3000 para 3 segundos).
});

</script>