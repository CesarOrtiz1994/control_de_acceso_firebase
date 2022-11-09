<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_POST[ 'id_user' ];

if($id != ""){
    $delete = $db->delete("user", $id);
    $obj[ 'res' ] = true;

echo json_encode( $obj );
 }

?>  