
<!-- modal card para editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Edita tu publicacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form edit -->
        <form method="post" action="../seccion/editLogic.php" enctype="multipart/form-data" >
            <!-- traemos el id para ser detectado por la function -->
            <input type="hidden" name="id_events" id="id_events">
            <input type="hidden" name="id_owner" id="id_owner">
            
            <div class="mb-3">
              <label for="nameS" class="form-label">Nombre del salon:</label>
              <input type="text" class="form-control" name="nameS" id="nameS" placeholder="Ingrese el nombre">
            </div>
            <div class="mb-3">
              <label for="descripS" class="form-label">Descripcion:</label>
              <input type="text" class="form-control" name="descripS" id="descripS" placeholder="Ingrese la descripcion">
            </div>
            <div class="mb-3">
              <label for="ubiS" class="form-label">Ubicacion:</label>
              <input type="text" class="form-control" id="ubiS" name="ubiS" placeholder="Ingrese la ubicacion">
            </div>
            <div class="mb-3">
              <label for="face" class="form-label">Facebook:</label>
              <input type="text" class="form-control" id="face" name="face" placeholder="Ingrese el facebook">
            </div>
            <div class="mb-3">
              <label for="insta" class="form-label">Instagram:</label>
              <input type="text" class="form-control" id="insta" name="insta" placeholder="Ingrese el instagram">
            </div>
          </form>
          <!-- end form edit -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-warning">Editar publicacion</button>
      </div>
    </div>
  </div>
</div>


<!-- end modal card edit -->