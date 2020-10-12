<?php

if (isset($this->planos)) {
    $plano = $this->planos;
?>
    <section id="obra">
        <div class="container rounded bg-light mt-5 mb-5">
            <div class="row ">
                <div class="col mt-3">
                    <h2 class="text-center">Obra</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 mb-3">
                    <h3>Plano arquitectónico de la obra</h3>
                </div>
                <div class="col-8">
                    <embed src="<?php echo constant('URL') . 'resources/obra/planos/' . $plano->nombre ?>" type="application/pdf" class="planos-pdf" />
                    <p class="text-center">
                        <cite title="Source Title">
                            Documento actualizado el <?php echo $plano->fecha; ?>
                        </cite>
                    </p>
                </div>
            </div>
            <div class="row ">
                <div class="col mb-3 ">
                    <button class="btn btn-dark bg-red-pj" data-toggle="modal" data-target="#modalObra">Editar documento</button>
                    <a class="btn btn-dark bg-red-pj float-right" href="<?php echo constant('URL') . 'resources/obra/planos/' . $plano->nombre ?>" target="_blank">
                        Ver documento
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php

} else {
?>
    <section id="obra">
        <div class="container rounded bg-light mt-5 mb-5">
            <div class="row ">
                <div class="col mt-3">
                    <h2 class="text-center">Obra</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 mb-3">
                    <h3>No existe plano arquitectónico de la obra.</h3>
                </div>
            </div>
            <div class="row ">
                <div class="col mb-3 ">
                    <button class="btn btn-dark bg-red-pj" data-toggle="modal" data-target="#modalObra">Agregar plano</button>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>