<!-- agregar clave -->

<div class="modal fade" id="Claves" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="titulo_moda"></h1>
                <button type="button" id="cerrar_clave" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_clave" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="mol" class="form-label">Nombre completo</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-universal-access"></i></span>
                            <input id="nom_acceso" name="nom_acceso" type="text" class="form-control"
                                placeholder="Nombre" required>
                            <input id="ape_acceso" name="ape_acceso" type="text" class="form-control"
                            placeholder="Apellido" required>

                            <div class="invalid-feedback">
                                El nombre y apellido es requerido.
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="mol" class="form-label">Puesto</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-person-digging"></i></span>
                            <input id="puesto_acceso" name="puesto_acceso" type="text" class="form-control"
                                placeholder="Puesto del trabajador" required>
                            <div class="invalid-feedback">
                                El puesto es requerido.
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="mol" class="form-label">Clave</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-key"></i></span>
                            <!-- solo permite numeros ASCII -->
                            <input id="clave_acceso" name="clave_acceso" type="text" maxlength="5" class="form-control"
                                placeholder="Clave de acceso"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
                            <div class="invalid-feedback" id="mes_clave">
                            </div>

                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn_modal" class="btn btn-primary"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- eliminar clave -->
<div class="modal fade" id="Claves_del" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminartitle">Eliminar clave</h1>
        <button type="button" id="cerrar_del_clave" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Desear eliminar la clave: <span id="clave_user_del"></span>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_clave_del" id="id_clave_del">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="del_clave()" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>