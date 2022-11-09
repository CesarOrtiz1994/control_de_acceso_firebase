<?php 
include('include/header.php');
?>

<div class="tab-content col-sm-11 col-md-10 p-5" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-Inicio" role="tabpanel" aria-labelledby="v-pills-Inicio-tab"
        tabindex="0">
        <?php
      include('inicio/inicio.php');
      ?>
    </div>
    <div class="tab-pane fade" id="v-pills-User" role="tabpanel" aria-labelledby="v-pills-User-tab" tabindex="0">
        <?php
      include('usuarios/usuarios.php');
      ?>
    </div>
    <div class="tab-pane fade" id="v-pills-Modulos" role="tabpanel" aria-labelledby="v-pills-Modulos-tab" tabindex="0">
        <?php
      include('modulos/modulos.php');
      ?>
    </div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-white" id="header_toast">
      <strong class="me-auto"><h4><i class="fa-solid fa-bell"></i></h4></strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body bg-opacity-75 text-white" id="body_toast">
      
    </div>
  </div>
</div>




<?php
include('include/footer.php');
?>