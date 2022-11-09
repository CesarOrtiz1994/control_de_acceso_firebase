<nav class="navbar bg-light shadow">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="#">
            <img src="<?php echo $Base_URL ?>static/img/logo.png" alt="I" height="30">
        </a>

        <div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['nombre'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Controller/login/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php if ($_SESSION['modulo'] == null) { ?>

<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3 col-sm-1 col-md-2  he-100 p-3 bg-light menu" id="v-pills-tab"
        role="tablist" aria-orientation="vertical">
        <button class="mt-5 nav-link active text-start" id="v-pills-Inicio-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-Inicio" type="button" role="tab" aria-controls="v-pills-Inicio"
            aria-selected="true"><i class="fa-solid fa-house mx-2"></i> Inicio</button>
    </div>

    <?php }  else {?>

        <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3 col-sm-1 col-md-2  he-100 p-3 bg-light menu" id="v-pills-tab"
            role="tablist" aria-orientation="vertical">
            <button class="mt-5 nav-link active text-start" id="v-pills-Inicio-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-Inicio" type="button" role="tab" aria-controls="v-pills-Inicio"
                aria-selected="true"><i class="fa-solid fa-house mx-2"></i> Inicio</button>
            <button class="mt-2 nav-link text-start" onclick="cargar_claves()" id="v-pills-Claves-tab"
                data-bs-toggle="pill" data-bs-target="#v-pills-Claves" type="button" role="tab"
                aria-controls="v-pills-Claves" aria-selected="false"><i class="fa-solid fa-unlock-keyhole"></i>
                Claves</button>
            <button class="mt-2 nav-link text-start" onclick="cargar_accesos()" id="v-pills-Accesos-tab"
                data-bs-toggle="pill" data-bs-target="#v-pills-Accesos" type="button" role="tab"
                aria-controls="v-pills-Accesos" aria-selected="false"><i class="fa-solid fa-door-open"></i>
                Accesos</button>
        </div>

    <?php } ?>

    