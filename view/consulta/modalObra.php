<!-- Modal -->
<div class="modal fade" id="modalObra" tabindex="-1" role="dialog" aria-labelledby="modalObraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalObraLabel">Plano arquitectónico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo constant('URL') . 'obra/agregarplano/'. $this->registro->no_expediente . '/' . $this->registro->id ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="plano">Seleccione un archivo en formato PDF menor o igual a 1MB </label>
                        <input class="form-control-file" type="file" name="plano" id="plano" required>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Subir archivo">
                    </div>
                </form>
        </div>
    </div>
</div>