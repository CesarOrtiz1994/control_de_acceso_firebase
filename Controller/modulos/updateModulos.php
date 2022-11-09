<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_POST[ 'key' ];

$update = $db->update("modulos", $id, [
    'estatus'        => $_POST['estatus']
 ]);

$obj[ 'res' ] = true;

echo json_encode( $obj );

?>  