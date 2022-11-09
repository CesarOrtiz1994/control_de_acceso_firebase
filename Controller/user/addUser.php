<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$correo = $_POST[ 'Correo' ];

$buscarEmail = $db->retrieve("user", "correo", "EQUAL", $correo);
$data = json_decode($buscarEmail, 1);

if(count($data) == 0) {
$insert = $db->insert( 'user', [
    'nombre'        => $_POST[ 'Nombre' ],
    'correo'        => $_POST[ 'Correo' ],
    'contrasena'    => $_POST[ 'Contrasena' ],
    'tipo'    => $_POST[ 'Tipo' ]
] );

$obj[ 'res' ] = true;
$obj[ 'mes' ] = "Usuario agregado correctamente";
} else {
    $obj[ 'res' ] = false;
    $obj[ 'mes' ] = "El correo ya existe";
} 

echo json_encode( $obj );

?>  