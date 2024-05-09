<div class="modal fade" id="ModalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-danger-subtle">
                <div class="modal-header ">
                    <h5 class="modal-title text-primary"><strong>¡Esta acción es irreversible!</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-danger" role="alert" id="alerta">
                        Seguro que deseas eliminar: <strong class="pelicula-a-eliminar fw-bold text-uppercase"></strong>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-danger btn-eliminar" id="btn-eliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>