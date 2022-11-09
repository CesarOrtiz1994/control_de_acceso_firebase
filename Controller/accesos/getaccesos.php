<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB($databaseURL);

$modulo = $_SESSION['modulo'];

$data = $db->todosAccesos($modulo);
$data = json_decode($data, 1);

echo json_encode($data);

?> 