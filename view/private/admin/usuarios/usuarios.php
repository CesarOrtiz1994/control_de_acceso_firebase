<div class="card w-100 border-primary shadow">
    <div class="card-header d-flex titulo-c">
        <h2><i class="fa-solid fa-users mx-2"></i> Usuarios</h2>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Usuarios" data-action="Agregar usuario" onclick="return handleModal(this)"> <i
                class="fa-solid fa-user-plus"></i> Agregar</button>
    </div>
    <div class="card-body contino-ca">
        <table class="table table-borderless">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Editar / Eliminar</th>
                </tr>
            </thead>
            <tbody id="tableUser">
            </tbody>
        </table>
    </div>
</div>

<?php
include('modalUsuarios.php');
?>