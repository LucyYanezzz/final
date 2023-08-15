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
                <h1 class="fw-normal mb-3 pb-3 text-center text-dark" style="letter-spacing: 1px;">¡Anúnciate con nosotros!</h1>
                <!-- start form -->
                <form action="anuncioLogic.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="form-label text-dark">Nombre de la empresa:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de la empresa" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        <br>
                        <div class="form-group">
                            <label for="flyer" class="form-label text-dark">Flyer de la publicación:</label>
                            <input type="file" name="flyer" class="form-control" id="flyer" accept="image/*" placeholder="Flyer de la publicación" required>
                            <div id="emailHelp" class="form-text">Obligatorio</div>
                        </div>
                        <br>
                        <!-- optional social media -->
                        <div class="form-group">
                            <label for="face" class="form-label text-dark">Facebook:</label>
                            <input type="text" name="face" class="form-control" id="face" placeholder="Enlace de Facebook">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="insta" class="form-label text-dark">Instagram:</label>
                            <input type="text" name="insta" class="form-control" id="insta" placeholder="Enlace de Instagram">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="form-label text-dark">Teléfono:</label>
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Teléfono">
                            <div id="emailHelp" class="form-text">Opcional</div>
                        </div>
                        <br>
                            <!-- submit -->
                            <button type="button" class="btn btn-warning btn-rounded" >Realizar pago</button>
                            <button type="submit" name="anuncio" class="btn btn-success btn-rounded" >Agregar</button>
                    </form>
                <!-- end form publicar -->
                </div>
            </div>
        </div>
    </div>
<?php include('template/patita.php'); ?>