<div class="modal fade" id="ModalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-info text-light text-uppercase fw-bolder">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><strong><strong class="title-modal"></strong> datos de una Película</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formModificar formulario-añadir-modificar" class="row g-3 needs-validation">
                        <div class="col-md-2">
                            <label for="idModificar" class="form-label">ID</label>
                            <input type="text" class="form-control bg-dark" id="idModificar" name="id" value=""
                                readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="nombreModificar" class="form-label">Nombre</label>
                            <input type="text" class="form-control bg-secondary" id="nombreModificar" name="nombre"
                                value="" required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionModificar" class="form-label">Dirección</label>
                            <input type="text" class="form-control bg-secondary" id="direccionModificar"
                                name="direccion" value="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="categoriaModificar" class="form-label">Categoria</label>
                            <select class="form-select bg-secondary text-light modal-modificar-select"
                                aria-label="Default select example">
                                <?php foreach ($SQL_Categorias as $categoria): ?>
                                <option value="<?=$categoria->id_categoria;?>"><?=$categoria->nom_categoria;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcionModificar" class="form-label">Descripción</label>
                            <textarea class="form-control bg-secondary" id="descripcionModificar" rows="4" value=""
                                required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-primary enviar">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>