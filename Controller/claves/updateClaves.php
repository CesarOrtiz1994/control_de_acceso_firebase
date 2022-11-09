<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_SESSION[ 'modulo' ];
$clave = $_POST[ 'Clave' ];
$user = $_POST[ 'Nombre' ];

$update = $db->clave( 'modulos', $id, 'claves', $clave, [
    'nombre' => $user
] );

$obj[ 'res' ] = true;
$obj[ 'mes' ] = 'Se actualizaron los datos';

echo json_encode( $obj );

?>