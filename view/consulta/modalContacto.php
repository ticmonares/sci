

<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContactoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContactoLabel">Contácto telefónico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo constant('URL') . 'consulta/editarContacto/' . $this->registro->no_expediente ?>" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="nombreGob">Gobierno Estatal</label>
                            <input type="text" class="form-control" name="nombreGob" placeholder="Nombre de contácto" value="<?php echo $contactoGob; ?>" >
                            <input type="number" class="form-control" name="telGob" id="gobierno-estatal" placeholder="Número" value="<?php echo $telefonoGob; ?>" >
                        </div>
                        <div class="col-sm-4">
                            <label for="nombreProp">Propietario C/V</label>
                            <input type="text" class="form-control" name="nombreProp" placeholder="Nombre de contácto" value="<?php echo $contactoProp; ?>" >
                            <input type="number" class="form-control" name="telProp" id="telProp" placeholder="Número" valuse="<?php echo $telefonoProp; ?>" >
                        </div>
                        <div class="col-sm-4">
                            <label for="nombrePJ">Poder Judicial</label>
                            <input type="text" class="form-control" name="nombrePJ" placeholder="Nombre de contácto" value="<?php echo $contactoPJ; ?>" >
                            <input type="number" class="form-control" name="telPJ" id="telPJ" placeholder="Número" value="<?php echo $telefonoPJ; ?>" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Actualizar contáctos">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>