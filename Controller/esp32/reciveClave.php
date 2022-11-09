<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

//recibimos datos por metodo post del ESP
$id = $_POST[ 'modulo' ];
$clave = $_POST[ 'clave' ];
$accion = $_POST[ 'accion' ];

//validamos clave
$bucarNombre = $db->bucarclave( $id, $clave );
$data = json_decode( $bucarNombre, 1 );
//var_dump($data);}

//si no existe mandamos acceso denegado
if ( $data == null ) { 
    $obj = 'Acceso denegado';
} else {
    
    //validar accion
    if ($accion == "A" ) {
        $obj = 'Apertura';
        $apertura = $db->accesos( $id, [
        'nombre' => $data["nombre"],
        'fecha'  => date("Y-m-d H:i:s"),
        'accion' => $obj
        ]);
    } elseif ($accion == "C") {
        $obj = 'Cierre';
        $Cierre = $db->accesos( $id, [
        'nombre' => $data["nombre"],
        'fecha'  => date("Y-m-d H:i:s"),
        'accion' => $obj
        ]);
    } else {
        $obj = 'Accion no conocida ';
    }
}


echo json_encode( $obj );

?>