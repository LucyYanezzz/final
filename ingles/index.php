<?php $url="http://".$_SERVER['HTTP_HOST']."/integradora";
include('admin/config/conex.php');
  $queryP = "SELECT * FROM events LIMIT 9";
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
  // end query
  include('template/head.php');
?>

    
    <!--Hero-->
    <section class="hero">
      <div class="container-fluid my-5 rounded-3 ">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 bg-transparent ">
          <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <div class="lc-block mb-3 appear-left animated">
              <div editable="rich">
                <h1 class="fw-bolder text-dark appear-left animated">
                    Find an Event Venue
                </h1>
              </div>
            </div>
  
            <div class="lc-block mb-3">
              <div editable="rich">
                <p class="lead text-dark custom-bounceInUp" id="animated-paragraph">  
                Discover the leading platform in Chihuahua to find the perfect place for your special events. Our website connects you with a variety of event venues, from weddings and parties to conferences and meetings. Start your event planning with our reliable and comprehensive platform.
                </p>
              </div>
            </div>
  
            <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start"><a class="btn btn-dark px-4 me-md-2" href="salones.php" role="button">Search Venues</a></div>
          </div>
          <div class="col-lg-4 offset-lg p-0 overflow-hidden appear-right animated">
            <div class="lc-block"><img class="img-fluid 2" src="img\calendar.png" alt="Calendar Vector" /></div>
          </div>
        </div>
      </div>
    </section>
    <!-- end hero -->
  </header>
  
    <div class="container">
      <div class="row gx-5">
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
            <div class="card-body p-0">
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
                      alt="Image" />
                  </div>
                  <?php } ?>
                  <div class="carousel-item">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img2']; ?>" class="d-block w-100" alt="Image" />
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo 'admin/seccion/'.$imagen['img3']; ?>" class="d-block w-100" alt="Image" />
                  </div>
                </div>
              </div>
              <div class="card-text p-3">
                <h5 class="card-title fw-bold"><?php echo $salon['nameS']; ?></h5> 
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
        
        </div>
       

    <BR></BR><BR></BR><BR></BR><BR></BR><BR><BR><BR><BR>

   

<div class="container-lg container-fluid rounded-4 p-4">
  
    <div class="slide-down  text-center">
      <h1>Our Team</h1>
    </div>
    <div class="team-content">
      <div class="box">
        <img src="img/jin.jpeg" alt="" class="yoni">
        <h3>Jean Lozano</h3>
        <h5>Marketing Director</h5>
        <div class="icons">
          <a href=""><i class="ri-github-line"></i></a>
          <a href="https://www.instagram.com/j.e.a.n.011/?utm_source=qr&igshid=NGExMmI2YTkyZg%3D%3D"><i class="ri-instagram-line"></i></a>
          <a href=""><i class="ri-twitter-x-line"></i></a>
        </div>
      </div>
  
      <div class="box">
        <img src="img/ramon.jpeg" alt="" class="reimonn">
        <h3>Ramón Aguilera</h3>
        <h5>Front-End Developer</h5>
        <div class="icons">
          <a href=""><i class="ri-github-line"></i></a>
          <a href=""><i class="ri-instagram-line"></i></a>
          <a href=""><i class="ri-twitter-x-line"></i></a>
        </div>
      </div>
  
      <div class="box">
        <img src="img/davidsalas.jpeg" alt="" class="yoni">
        <h3>David Salas</h3>
        <h5>Front-end Developer</h5>
        <div class="icons">
          <a href=""><i class="ri-github-line"></i></a>
          <a href=""><i class="ri-instagram-line"></i></a>
          <a href=""><i class="ri-twitter-x-line"></i></a>
        </div>
      </div>
  
      <div class="box">
        <img src="img/miki.jpeg" alt="" class="yoni">
        <h3>Miguel Millán</h3>
        <h5>Front-end Developer</h5>
        <div class="icons">
          <a href=""><i class="ri-github-line"></i></a>
          <a href=""><i class="ri-instagram-line"></i></a>
          <a href=""><i class="ri-twitter-x-line"></i></a>
        </div>
      </div>
  
      <div class="box">
        <img src="img/lucyyañez.jpeg" alt="" class="yoni">
        <h3>Lucía Yañez</h3>
        <h5>Back-end Development Leader & Developer </h5>
        <div class="icons">
          <a href="https://github.com/LucyYanezzz"><i class="ri-github-line"></i></a>
          <a href="https://www.instagram.com/lucyyanezmx/"><i class="ri-instagram-line"></i></a>
          <a href="https://twitter.com/LucyYaez15"><i class="ri-twitter-x-line"></i></a>
        </div>
      </div>
  
  
    </div>
</div>

</section>

<?php include('template/patita.php'); ?>