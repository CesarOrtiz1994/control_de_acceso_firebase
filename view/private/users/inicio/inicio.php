<div class="card w-100 border-primary shadow">
    <div class="card-header d-flex titulo-c">
        <h2><i class="fa-solid fa-house mx-2"></i> Inicio</h2>
    </div>
    <div class="card-body">


    <?php if ($_SESSION['modulo'] == null) {
        echo "Aun no tines un modulo asignado";
    }  else {?>

    <h4>Tu modulo es: <?php echo $_SESSION['modulo'] ?></h4>

    <?php } ?>
    </div>
</div>