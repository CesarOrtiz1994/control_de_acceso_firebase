<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

if (isset($_SESSION['email'])) {
    unset($_SESSION['email']);
    unset($_SESSION['nombre']);
    unset($_SESSION['tipo']);
    unset($_SESSION['modulo']);
}

header("location: http://laptopfix.com.mx/controldeacceso/"); 