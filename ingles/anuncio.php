<?php
include('template/head.php');
include('admin/config/conex.php');
?>
<!-- inicia section publicar -->
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <br><br>
            <!-- title section -->
            <div class="card shadow p-3 mb-3 bg-body rounded">
                <h1 class="fw-normal mb-3 pb-3 text-center text-dark" style="letter-spacing: 1px;">Advertise with Us!</h1>
                <!-- start form -->
                <form action="anuncioLogic.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="form-label text-dark">Company Name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Company Name" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        <br>
                        <div class="form-group">
                            <label for="flyer" class="form-label text-dark">Flyer for the Advertisement:</label>
                            <input type="file" name="flyer" class="form-control" id="flyer" accept="image/*" placeholder="Advertisement Flyer" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        </div>
                        <br>
                        <!-- optional social media -->
                        <div class="form-group">
                            <label for="face" class="form-label text-dark">Facebook:</label>
                            <input type="text" name="face" class="form-control" id="face" placeholder="Facebook Link">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="insta" class="form-label text-dark">Instagram:</label>
                            <input type="text" name="insta" class="form-control" id="insta" placeholder="Instagram Link">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="form-label text-dark">Phone:</label>
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                            <!-- submit -->
                            <button type="button" class="btn btn-warning btn-rounded" >Make Payment</button>
                            <button type="submit" name="anuncio" class="btn btn-success btn-rounded" >Add</button>
                    </form>
                <!-- end form publicar -->
                </div>
            </div>
        </div>
    </div>
<?php include('template/patita.php'); ?>