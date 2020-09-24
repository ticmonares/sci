<!-- Modal -->
<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="modalStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatusLabel">Subir evidencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo constant('URL') . 'consulta/subirStatus/' . $this->registro->no_expediente."/".$this->registro->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="doc_status">Documentación que ampara status del inmueble</label>
                        <input class="form-control-file" type="file" name="docStatus" id="doc_status" required>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Subir documento">
                    </div>
                </form>
        </div>
    </div>
</div>