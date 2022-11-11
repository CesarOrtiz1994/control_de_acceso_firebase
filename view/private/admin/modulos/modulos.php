<div class="card w-100 border-primary shadow">
    <div class="card-header d-flex titulo-c">
        <h2> <i class="fa-solid fa-microchip mx-2"></i> Modulos</h2>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Modulos">
         <i class="fa-solid fa-square-plus"></i>  Agregar</button>
    </div>
    <div class="card-body contino-ca">
        <table class="table table-borderless ">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Ubicacion</th>
                    <th scope="col" class="text-center">Numero de puertas</th>
                    <th scope="col" class="text-center">Asignaciones</th>
                </tr>
            </thead>
            <tbody id="tableModelos">
            </tbody>
        </table>
    </div>
</div>

<?php
include('modalesModulos.php');
?>