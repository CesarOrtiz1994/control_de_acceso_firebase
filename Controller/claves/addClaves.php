<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$id = $_SESSION[ 'modulo' ];
$clave = $_POST[ 'Clave' ];
$user = $_POST[ 'Nombre' ];

$bucarNombre = $db->bucarclave( $id, $clave );
$data = json_decode( $bucarNombre, 1 );
//var_dump($data);

if ( $data == null ) {
    
  $update = $db->clave( 'modulos', $id, 'claves', $clave, [
        'nombre' => $user
    ] );

    $obj[ 'res' ] = true;
    $obj[ 'mes' ] = 'Se agrego un nuevo acceso';
} else {
    $obj[ 'res' ] = false;
    $obj[ 'mes' ] = 'La clave ya existe';
}


echo json_encode( $obj );

?>