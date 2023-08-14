<?php
include('template/head.php');
include('admin/config/conex.php');

if (isset($_GET['id'])) {
    $salonId = $_GET['id'];

    // Realiza una consulta para obtener la información completa del salón
    $querySalon = "SELECT * FROM events WHERE id_events = ?";
    $stmtSalon = mysqli_stmt_init($cnx);

    if (mysqli_stmt_prepare($stmtSalon, $querySalon)) {
        mysqli_stmt_bind_param($stmtSalon, "s", $salonId);  
        mysqli_stmt_execute($stmtSalon);
        $resSalon = mysqli_stmt_get_result($stmtSalon);
        $salonDetalles = mysqli_fetch_assoc($resSalon);
    } else {
        echo "Error al preparar la consulta";
    }

    $queryImg = "SELECT * FROM imgevents WHERE id_events=?";
    $stmtImg = mysqli_stmt_init($cnx);
    if(mysqli_stmt_prepare($stmtImg,$queryImg)){
      mysqli_stmt_bind_param($stmtImg,"s", $salonId);
      mysqli_stmt_execute($stmtImg);
      $resImg=mysqli_stmt_get_result($stmtImg);
      $imagenes=mysqli_fetch_all($resImg, MYSQLI_ASSOC);
    }
    } else {
        echo "Falta el parámetro 'id'";
    }

    $queryOwner = "SELECT * FROM owner WHERE id_owner = ?";
    $stmtOwner = mysqli_stmt_init($cnx);

    if (mysqli_stmt_prepare($stmtOwner, $queryOwner)) {
        $id_owner = $salonDetalles['id_owner']; 
        mysqli_stmt_bind_param($stmtOwner, "s", $id_owner);
        mysqli_stmt_execute($stmtOwner);
        $resOwner = mysqli_stmt_get_result($stmtOwner);
        $ownerDetalles = mysqli_fetch_assoc($resOwner);
    } else {
        echo "Error al preparar la consulta del propietario";
    }

    $queryC = "SELECT * FROM calendar WHERE id_events = ?";
    $stmtC = mysqli_stmt_init($cnx);
    if(mysqli_stmt_prepare($stmtC, $queryC)){
        mysqli_stmt_bind_param($stmtC, "s", $salonId);
        mysqli_stmt_execute($stmtC);
        $resC = mysqli_stmt_get_result($stmtC);
        $calendar=mysqli_fetch_assoc($resC);
    }

?>

 <style>
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
    <BR></BR>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="m-0 text-dark card-title"><?php echo $salonDetalles['nameS'];?></h4>
            </div>
            <br>
            <?php foreach ($imagenes as $imagen) { ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img1']; ?>" class="img-fluid" alt="Imagen 1">
                </div>
                <div class="col-md-4">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img2']; ?>" class="img-fluid" alt="Imagen 2">
                </div>
                <div class="col-md-4">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img3']; ?>" class="img-fluid" alt="Imagen 3">
                </div>
            </div>
            <?php } ?>
            <div class="card-body">
                <hr>
                <h5 class="card-title text-dark">Administrador</h5>
                <p class="card-text text-dark"><?php echo $ownerDetalles['name']. " ". $ownerDetalles['lastname'];?></p>
                <hr>
                <h5 class="card-title text-dark">
                    <i class="bi bi-list-check"></i> Detalles
                </h5>
                <p class="card-text text-dark"><?php echo $salonDetalles['descripS'];?></p>
                <hr>
                <h5 class="card-title text-dark">
                    <i class="bi bi-person-lines-fill"></i> Contacto
                </h5>
                <div class="d-flex align-items-center mb-3">
                <a href="tel:<?php echo $ownerDetalles['phone']; ?>" class="btn btn-danger me-2"><i class="bi bi-phone"></i></a>
                    <p class="card-text text-dark"><?php echo $ownerDetalles['phone'];?></p>
                </div>
                <div class="d-flex align-items-center mb-3">
                <a href="<?php echo $salonDetalles['face']; ?>" target="_blank" class="btn btn-secondary me-2"><i class="bi bi-facebook"></i></a>
                    <p class="card-text text-dark"><?php echo $salonDetalles['face'];?></p>
                </div>
                <div class="d-flex align-items-center mb-3">
                <a href="<?php echo $salonDetalles['insta']; ?>" target="_blank" class="btn btn-secondary"><i class="bi bi-instagram"></i></a>
                    <p class="card-text text-dark"><?php echo $salonDetalles['insta'];?></p>
                </div>
                <hr>
                <h5 class="card-title text-dark">
                    <i class="bi bi-geo-alt-fill"></i> Ubicacion
                </h5>
                <p class="card-text text-dark"><?php echo $salonDetalles['ubiS'];?></p>
                <hr>
                <?php if (!empty($calendar)) { ?>
                    <hr>
                    <h5 class="card-title text-dark">
                        <i class="bi bi-calendar-fill"></i> Fechas ocupadas
                    </h5>
                    <ul class="list-group">
                        <li class="list-group-item text-dark"><?php echo $calendar['start']; ?> - <?php echo $calendar['end']; ?></li>
                    </ul>
                    <hr>
                <?php } ?>
                <hr>
            </div>
        </div>
    </div>

  

<?php include('template/patita.php'); ?>

