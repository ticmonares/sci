<div class="container bg-light rounded mb-5">
    <div class="photo-gallery ">
        <div class="container ">
            <div class="intro">
                <h2 class="text-center">Galería de Inmueble</h2>
                <!-- <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p> -->
            </div>
            <div class="row photos justify-content-center ">
                <?php
                foreach ($this->imagen as $imagen) {
                ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                        <a data-lightbox="photos" href="<?php echo constant('URL') . 'resources/imagenes-inmuebles/' . $imagen->nombre; ?>">
                            <img class="img-fluid img-inmueble" src="<?php echo constant('URL') . 'resources/imagenes-inmuebles/' . $imagen->nombre; ?>">
                        </a>
                        <p class="text-center">
                            <cite title="Source Title">
                                Imagen actualizada el <?php echo $imagen->fecha; ?>
                            </cite>
                        </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3 mb-3">
            <button class="btn btn-dark bg-red-pj" data-toggle="modal" data-target="#modalImagen">Actualizar imagenes</button>
        </div>
    </div>
</div>

<script>
    
</script>