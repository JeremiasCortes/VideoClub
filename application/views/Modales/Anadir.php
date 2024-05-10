<div class="modal fade" id="ModalAnadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-info text-light text-uppercase fw-bolder">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong class="title-modal">Dar de Alta</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAñadir" class="row g-3 needs-validation">
                        <div class="col-md-2">
                            <label for="idAñadir" class="form-label ">ID</label>
                            <input type="text" class="form-control bg-dark" id="idAñadir" name="id" value="" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="nombreAñadir" class="form-label ">Nombre</label>
                            <input type="text" class="form-control bg-secondary" id="nombreAñadir" name="nombre"
                                value="" required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionAñadir" class="form-label">Dirección</label>
                            <input type="text" class="form-control bg-secondary" id="direccionAñadir" name="direccion"
                                value="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="categoriaAñadir" class="form-label">Categoria</label>
                            <select class="form-select bg-secondary text-light modal-anadir-select"
                                aria-label="Default select example">
                                <option selected disabled value="0">Selecciona la categoria de la pelicula</option>
                                <?php foreach ($SQL_Categorias as $categoria): ?>
                                <option value="<?=$categoria->id_categoria;?>"><?=$categoria->nom_categoria;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcionAñadir" class="form-label">Descripción</label>
                            <textarea class="form-control bg-secondary" id="descripcionAñadir" rows="4" value=""
                                required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary cancelar"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-primary enviar">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>