<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB( $databaseURL );

$email = $_POST[ 'Correo' ];
$contra = $_POST[ 'Password' ];

$buscaEmail = $db->retrieve("user", "correo", "EQUAL", $email);
$data = json_decode($buscaEmail, 1);

if(count($data) == 0) {
    $obj[ 'res' ] = false;
    $obj[ 'mes' ] = "Correo no existe";
} else {
    $id = array_keys($data)[0];
    if($data[$id]['contrasena'] != $contra)
    {
        $obj[ 'res' ] = false;
        $obj[ 'mes' ] = "Contraseña incorrecta";
    } else {
        $obj[ 'res' ] = true;
        $_SESSION['email'] = $data[$id]['correo'];
        $_SESSION['tipo'] = $data[$id]['tipo'];
        $_SESSION['nombre'] = $data[$id]['nombre'];
        $_SESSION['id'] = $data[$id];
        $_SESSION['modulo'] = $data[$id]['modulo'];
    }
}
 
echo json_encode( $obj );

?>