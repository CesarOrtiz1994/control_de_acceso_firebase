<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_POST[ 'id_user' ];

$update = $db->update("user", $id, [
    'nombre'        => $_POST['Nombre'],
    'correo'        => $_POST['Correo'],
    'contrasena'    => $_POST['Contrasena']
 ]);

$obj[ 'res' ] = true;

echo json_encode( $obj );

?> 