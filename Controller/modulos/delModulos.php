<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_POST[ 'Key' ];

$update = $db->update("modulos", $id, [
    'estatus'    => 'Eliminado'
 ]);

$obj[ 'res' ] = true;

echo json_encode( $obj );

?>  