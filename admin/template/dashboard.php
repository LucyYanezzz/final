<?php 
  // include conexion and logic
  include('../config/conex.php');
  include('head.php');
  // genero mi id de session
  $id_owner=$_SESSION['id_owner'];
  // query para traer todos los datos de events segun el id
  $queryP = "SELECT * FROM events WHERE id_owner=?";
  // preparo la consulta
  $stmt=mysqli_stmt_init($cnx);
  if(mysqli_stmt_prepare($stmt,$queryP)){
    // agrego parametros a la consulta
    mysqli_stmt_bind_param($stmt, "s", $id_owner);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $salones=mysqli_fetch_all($res, MYSQLI_ASSOC);
  }else{
    echo "Error al preparar la consulta";
  }
  // end query
?>

  <!-- div de bienvenida al usuario -->
<div class="bg-light">
    <br>
    <!-- names and lastname with session variables -->
    <h2>¡Bienvenid@ <?php echo $_SESSION['name']. " " . $_SESSION['lastname']; ?>!</h2>
</div>
</br>
<!-- titulo de apartado de proyectos -->
<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Tus publicaciones</h5>
<!-- tabla donde salen los eventos que el usuario registro -->
<div class="col-md-10">
  <div class="table-responsive">
    <table class="table table-bordered table-hover ">
      <thead>
        <tr>
          <th scope="col">Nombre </th>
          <th scope="col">Descripción </th>
          <th scope="col">Ubicación </th>
          <th scope="col">Facebook </th>
          <th scope="col">Instagram </th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        
        </tr>
      </thead>
      <tbody>
        <!-- sacamos los datos del array mediante un foreach -->
        <?php foreach($salones as $salon){ ?>
          <tr class="">
            <td> <?php echo $salon['nameS']; ?></td>
            <td><?php echo $salon['descripS']; ?></td>
            <td><?php echo $salon['ubiS']; ?></td>
            <td><?php echo $salon['face']; ?></td>
            <td><?php echo $salon['insta']; ?></td>
           
            <!-- acciones del usuario, edit, delete and calendar -->
            <div>
            <td>
              <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="<?php echo $salon['id_events']; ?> ">
                <i class="bi bi-pencil-square"></i>
                Editar
              </a>
            </td>
            <td>
            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?php echo $salon['id_events']; ?>">
                <i class="bi bi-trash3-fill"></i>
                Eliminar
              </a>  
            </td>
            </div>
            <!-- end actions -->
          </tr>
        <?php } ?>
        <!-- end foreach -->
      </tbody>
    </table>
  </div>
</div>
<!-- end tabla -->

<!-- funcionalidades con bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<!-- include components php -->
<?php include('patita.php'); 
  include('../seccion/editModal.php');
  include('../seccion/deleteModal.php');
?>

<!-- scrip edit and delete with modals -->
<script>
  // identificar que se selecciono la ventana modal
  let editModal = document.getElementById('editModal');
  let deleteModal = document.getElementById('deleteModal');

  // identificar cual boton se selecciono
  editModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget;
    let id_events = button.getAttribute('data-bs-id');

    // vaamos a detectar los datos por su #id
    let inputId = editModal.querySelector('.modal-body #id_events');
    let inputName = editModal.querySelector('.modal-body #nameS');
    let inputDescrip = editModal.querySelector('.modal-body #descripS');
    let inputUbi = editModal.querySelector('.modal-body #ubiS');
    let inputFace = editModal.querySelector('.modal-body #face');
    let inputInsta = editModal.querySelector('.modal-body #insta');
    let inputOwner = editModal.querySelector('.modal-body #id_owner');

    // ruta pra la peticion de los datoss
    let url = "../seccion/getData.php";
    // para pasar los datos
    let formData = new FormData();
    formData.append('id_events', id_events);
    // peticiones nativas
    fetch(url, {
      method: "POST",
      body:formData
    }).then(response => response.json())
    .then(data => {
      // traigo los datos a mandar
      inputId.value = data.id_events;
      inputName.value = data.nameS;
      inputDescrip.value = data.descripS;
      inputUbi.value = data.ubiS;
      inputFace.value = data.face;
      inputInsta.value = data.insta;
      inputOwner.value = data.id_owner;
    }).catch(err => console.log(err));
  })

  // seleccion de boton modal
  deleteModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget;
    let id_events = button.getAttribute('data-bs-id');
    deleteModal.querySelector('.modal-footer #id_events').value = id_events;
  })


  // function sweet alert
  function mostrarAlertaExitosa() {
    Swal.fire({
      icon: 'success',
      title: '¡Edición Exitosa!',
      text: 'La publicación se ha editado correctamente.',
      confirmButtonText: 'Aceptar'
    });
  }
</script>