<!-- agregar usuarios -->

<div class="modal fade" id="Usuarios" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="titulo_moda"></h1>
                <button type="button" id="cerrar" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_add_user" class="needs-validation" novalidate >
                    <input type="hidden" id="id_user" name="id_user">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-tie"></i></span>
                            <input id="Nombre" name="Nombre" type="text" class="form-control" placeholder="Nombre"
                                aria-label="Nombre" value="" required>
                            <div class="invalid-feedback">
                                El nombre es requerido.
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Correo" class="form-label">Correo electronico</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                            <input id="Correo" name="Correo" value="" type="email" class="form-control"
                                placeholder="Correo electronico" aria-label="Correo" required>
                                <div class="invalid-feedback" id="alert_correo">
                                
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Contrasena" class="form-label">Contraseña</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input id="Contrasena" name="Contrasena" value="" type="password" class="form-control"
                                placeholder="Contraseña" aria-label="Contrasena" required>
                                <div class="invalid-feedback">
                                La contraseña es requerida.
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="guardarinfo" class="btn btn-primary">Agregar</button>
                </form> 
            </div>
        </div>
    </div>
</div>


<!-- Modal Eliminar -->
<div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminartitle">Eliminar usuario</h1>
        <button type="button" id="cerrar_del" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Desear eliminar a: <span id="nombre_user"></span>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_user_del" id="id_user_del">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="del_user()" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>
