<div class="card w-100 border-primary shadow">
    <div class="card-header d-flex titulo-c">
        <h2><i class="fa-solid fa-unlock-keyhole"></i> Claves</h2>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Claves"
            data-action="Agregar clave" onclick="return claveModal(this)">
            <i class="fa-solid fa-square-plus"></i> Agregar</button>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Editar / Eliminar</th>
                </tr>
            </thead>
            <tbody id="table_claves_de_acceso">
                
            </tbody>
        </table>
    </div>
</div>

<?php
include('modalesClaves.php');
?>