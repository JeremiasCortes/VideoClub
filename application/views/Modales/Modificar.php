<div class="modal fade" id="ModalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info text-light text-uppercase fw-bolder">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><strong><strong class="title-modal"></strong> datos de una
                        Película</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModal formulario-añadir-modificar" class="row g-3 needs-validation" method="post">
                    <div class="col-md-<?= (isset($SQL_Peliculas)) ? '2' : '4'; ?>">
                        <label for="idInput" class="form-label">ID</label>
                        <input type="text" class="form-control bg-dark" id="idInput" name="id" value="" readonly>
                    </div>
                    <div class="col-md-<?= (isset($SQL_Peliculas)) ? '5' : '8'; ?>">
                        <label for="nombreInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control bg-secondary" id="nombreInput" name="nombre" value=""
                            required>
                    </div>
                    <?php if (isset($SQL_Peliculas)) :?>
                    <div class="col-md-5">
                        <label for="direccionInput" class="form-label">Dirección</label>
                        <input type="text" class="form-control bg-secondary" id="direccionInput" name="direccion"
                            value="" required>
                    </div>
                    <div class="col-md-12">
                        <label for="categoriaInput" class="form-label">Categoria</label>
                        <select class="form-select bg-secondary text-light modal-Input-select"
                            aria-label="Default select example">
                            <option selected disabled value="1">Selecciona una categoria</option>
                            <?php foreach ($SQL_Categorias as $categoria): ?>
                            <option value="<?=$categoria->id_categoria;?>"><?=$categoria->nom_categoria;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcionInput" class="form-label">Descripción</label>
                        <textarea class="form-control bg-secondary" id="descripcionInput" rows="4" value=""
                            required></textarea>
                    </div>
                    <?php endif;?>
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