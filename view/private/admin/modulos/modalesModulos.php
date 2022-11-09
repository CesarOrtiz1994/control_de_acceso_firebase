<!-- agregar modulos -->

<div class="modal fade" id="Modulos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"> Agregar modal</h1>
                <button type="button" id="cerrar_m" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_add_modulos" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="mol" class="form-label">ID</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-microchip mx-2"></i></span>
                            <input id="id_mol" name="id_mol" type="text" class="form-control" placeholder="ID de modulo"
                                aria-label="id_mol" value="" required>
                            <div class="invalid-feedback">
                                El ID es requerido.
                            </div>

                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="add_modulo()" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Eliminar -->
<div class="modal fade" id="eliminar_m" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="eliminar_m" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminartitle">Eliminar modulo</h1>
                <button type="button" id="cerrar_del_model" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Desear eliminar el modulo: <span id="name_modulo"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_modulo_del" id="id_modulo_del">
                <input type="hidden" name="id_name_modulo" id="id_modulo_del">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="del_modulo()" class="btn btn-primary">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal asignar usuario -->
<div class="modal fade" id="Asignar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"> Asignar a Usuario</h1>
                <button type="button" id="cerrar_as" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_add_modulos" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="selec_user">
                        </select>
                        <div class="invalid-feedback">
                            Favor de selecionar un usuario!
                        </div>
                    </div>
                    <input type="hidden" id="id_del_modulo" name="id_del_modulo">
                    <input type="hidden" id="key_del_modulo" name="key_del_modulo">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="btn_asignar_modulo_a_user()" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>