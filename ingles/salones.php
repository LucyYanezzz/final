<?php include('template/head.php'); 
include('admin/config/conex.php');
$queryP = "SELECT * FROM events";
// preparo la consulta
$stmt=mysqli_stmt_init($cnx);
if(mysqli_stmt_prepare($stmt,$queryP)){
  // agrego parametros a la consulta
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $salones=mysqli_fetch_all($res, MYSQLI_ASSOC);
}else{
  echo "Error preparing the query";
}

$queryA = "SELECT * FROM anuncios";
// preparo la consulta
$stmt=mysqli_stmt_init($cnx);
if(mysqli_stmt_prepare($stmt,$queryA)){
  // agrego parametros a la consulta
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $anuncios=mysqli_fetch_all($res, MYSQLI_ASSOC);
}else{
  echo "Error preparing the query";
}
?>
<BR></BR><BR></BR><BR></BR>

<h2 class="text-dark text-center">Find your favorite venue</h2>
  <div class="container">
  
      <div class="row gx-5" >
        <?php foreach ($salones as $salon) {
          $salonId=$salon['id_events'];
          $queryImg = "SELECT * FROM imgevents WHERE id_events=?";
          $stmtImg = mysqli_stmt_init($cnx);
          if(mysqli_stmt_prepare($stmtImg,$queryImg)){
            mysqli_stmt_bind_param($stmtImg,"s", $salonId);
            mysqli_stmt_execute($stmtImg);
            $resImg=mysqli_stmt_get_result($stmtImg);
            $imagenes=mysqli_fetch_all($resImg, MYSQLI_ASSOC);
          }
        ?>
             <div class="col-md-4 mt-3">

          <!-- Aquí va la primera card con el carrusel -->
          <div class="card rounded-3">
            <div class="card-body p-0 salon-card" >
              <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                  <!-- botones-->
                </div>
                <div class="carousel-inner rounded-3">
                  <?php foreach ($imagenes as $imagen) { ?>
                  <div class="carousel-item active">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img1']; ?>" class="d-block w-100"
                      alt="Venue Image" />
                  </div>
                  <?php } ?>
                  <div class="carousel-item">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img2']; ?>" class="d-block w-100" alt="Venue Image" />
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img3']; ?>" class="d-block w-100" alt="Venue Image" />
                  </div>
                </div>
              </div>
              <div class="card-text p-3">
                <h5 class="card-title fw-bold text-dark"><?php echo $salon['nameS']; ?></h5> 
                
                <br>
                <a href="salonPage.php?id=<?php echo $salon['id_events']; ?>" class="btn btn-sm btn-light" >
                View
              </a> 
              </div>
               
          
            </div>
            
          </div>
        </div>
        <?php } ?>
    </div>
</div>

        <div class="col-md-4 mt-3">
       
            </div>
         
          </div>
     
          <div class="container">
  
  <div class="row gx-5" >
    <?php foreach ($anuncios as $anuncio) {?>
         <div class="col-md-4 mt-3">

      <!-- Aquí va la primera card con el carrusel -->
      <div class="card rounded-3">
        <div class="card-body p-0 salon-card" >
          <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded-3">
              <div class="carousel-item active">
                <img src="<?php echo $anuncio['flyer']; ?>" class="d-block w-100"
                  alt="Advertisement Image" />
              </div>

            </div>
          </div>
          <div class="card-text p-3">
            <h5 class="card-title fw-bold text-dark"><?php echo $anuncio['name']; ?></h5> 
            
            <p class="bounce-in-up text-dark"><?php echo $anuncio['name']; ?></p>
            <br>
            <div class="d-flex align-items-center mb-3">
              <a href="tel:<?php echo $anuncio['phone']; ?>" target="_blank" class="btn btn-black me-2"><i class="bi bi-phone"></i></a>
              <a href="<?php echo $anuncio['insta']; ?>" target="_blank" class="btn btn-black me-2"><i class="bi bi-instagram"></i></a>
              <a href="<?php echo $anuncio['face']; ?>" target="_blank" class="btn btn-black me-2"><i class="bi bi-facebook"></i></a>
            </div>
          </div>
           
      
        </div>
        
      </div>
    </div>
    <?php } ?>
</div>
</div>

    <div class="col-md-4 mt-3">
   
        </div>
     
      </div>
 
   
    <BR></BR><BR><BR></BR><BR><BR><BR><BR>
   
   
<?php include('template/patita.php'); ?>