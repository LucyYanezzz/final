<!-- modal card delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel">Aviso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <h5>¿Desea eliminar el registro?</h5>
      </div>
      <div class="modal-footer">
        <form action="../seccion/deleteLogic.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="id_events" id="id_events">
            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Eliminar publicacion</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal card delete -->