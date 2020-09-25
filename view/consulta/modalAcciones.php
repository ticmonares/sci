<!-- Modal -->
<div class="modal fade" id="modalAcciones" tabindex="-1" role="dialog" aria-labelledby="modalAccionesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAccionesLabel">Subir evidencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo constant('URL') . 'consulta/subirDocumento/'. 1 .'/'. $this->registro->no_expediente."/".$this->registro->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="documento">Evidencia documental sobre acciones realizadas</label>
                        <input class="form-control-file" type="file" name="documento" id="documento" required>
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