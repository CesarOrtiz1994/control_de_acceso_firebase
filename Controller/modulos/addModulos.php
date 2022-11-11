<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_POST[ 'Id' ];

$buscaidModulo = $db->retrieve("modulos", "id", "EQUAL", $id);
$data = json_decode($buscaidModulo, 1);

if(count($data) == 0) {
    $update = $db->update("modulos", $id, [
        'id'        => $_POST[ 'Id' ],
        'estatus'    => $_POST[ 'Estatus' ]
    ] );
    $update = $db->puerta($id, "1", [
        'nombre'        => "puerta1"
    ] );

    $obj[ 'res' ] = true;
    $obj[ 'mes' ] = "Modulo agregado correctamente";
} else {
    $obj[ 'res' ] = false;
    $obj[ 'mes' ] = "ID del Modulo ya existe";
} 

echo json_encode( $obj );

?>  