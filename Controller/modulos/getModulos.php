<?php
include( '../../config/config.php' );
include( '../../config/firebaseRDB.php' );

$db = new firebaseRDB($databaseURL);

$data = $db->retrieve("modulos");
$data = json_decode($data, 1);

echo json_encode($data);

?> 