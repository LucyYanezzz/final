<?php include('../template/head.php');
  include('../config/conex.php');
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
<br><br>
<section >
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <!-- traemos la foto de perfil del usuario -->
            <img src="<?php echo $_SESSION['profilePhoto']; ?>" alt="Foto de perfil"
              class="rounded-circle img-fluid" style="width: 150px;">
              <!-- traemos el nombre del usuario -->
            <h5 class="my-3"><?php echo $_SESSION['name']. " " . $_SESSION['lastname']; ?></h5>
            <p class="text-muted mb-1">Administrador</p>
            <hr>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProfileModal">Editar perfil</button>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">

              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="bi bi-info-circle-fill fa-lg text-warning"></i>
                <h5 class="mb-0">Tus salones</h5>
              </li>
              <?php foreach($salones as $salon){ ?>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0"><?php echo $salon['nameS']; ?></p>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
          <h5 class="mb-0">
            <i class="bi bi-person-circle text-info"></i>
            Información personal
          </h5>
          <hr><br>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['name']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Apellido</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['lastname'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Correo electrónico</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['mail']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teléfono</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['phone']; ?></p>
              </div>
            </div>
          </div>
        </div>
</section>

<!-- modal de edicion -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Editar perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- formulario de edicion -->
        <form action="editPerfil.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="id_owner" id="id_owner" value="<?php echo $_SESSION['id_owner']; ?>">
            
            <div class="mb-3">
              <label for="name" class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre" value="<?php echo $_SESSION['name']; ?>">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Apellido:</label>
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Ingrese el apellido" value="<?php echo $_SESSION['lastname']; ?>">
            </div>
            <div class="mb-3">
              <label for="mail" class="form-label">Correo electrónico:</label>
              <input type="text" class="form-control" id="mail" name="mail" placeholder="Ingrese el correo electrónico" value="<?php echo $_SESSION['mail']; ?>">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Teléfono:</label>
              <input type="phone" class="form-control" id="phone" name="phone" placeholder="Ingrese el teléfono" value="<?php echo $_SESSION['phone']; ?>">
            </div>
            <div class="mb-3">
                <label for="profilePhoto" class="form-label">Nueva foto de perfil:</label>
                <input type="file" name="profilePhoto" id="profilePhoto" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('../template/patita.php'); ?>