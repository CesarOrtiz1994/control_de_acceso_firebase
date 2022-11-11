<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$modulo = $_POST[ 'Modulo' ];
$puerta = $_POST[ 'Numpuerta' ];

    $update = $db->puerta($modulo, $puerta, [
        'nombre'        => "puerta".$puerta
    ] );

    if ($update) {
        $obj[ 'res' ] = true;
        $obj[ 'mes' ] = "Nueva puerta creada";
    } else {
        $obj[ 'res' ] = false;
        $obj[ 'mes' ] = "Error intente nuevamente";
    } 

echo json_encode( $obj );

?>  