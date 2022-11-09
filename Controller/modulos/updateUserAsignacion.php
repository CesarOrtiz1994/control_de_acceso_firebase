<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_POST[ 'key' ];

$update = $db->update("user", $id, [
    'modulo'        => $_POST['modulo']
 ]);

$obj[ 'res' ] = true;

echo json_encode( $obj );

?>  