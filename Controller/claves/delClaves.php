<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id_del = $_SESSION[ 'modulo' ];
$clave_del = $_POST[ 'clave' ];

if($id_del != ""){
    $delete = $db->deleteClave($id_del, $clave_del);
    $obj[ 'res' ] = true;

echo json_encode( $obj );
 }

?>  