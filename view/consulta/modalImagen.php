<!-- Modal -->
<div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="modalImagenLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImagenLabel">Actualizar imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo constant('URL') . 'consulta/editarImagen/'. $this->registro->no_expediente ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img_inmueble">Seleccione un archivo en formato PNG/JPG/JPEG menor o igual a 1MB </label>
                        <input class="form-control-file" type="file" name="img_inmueble" id="img_inmueble" required>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Subir imagen">
                    </div>
                </form>
        </div>
    </div>
</div>