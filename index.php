<?php

$Base_URL = "http://laptopfix.com.mx/controldeacceso/";

include("config/config.php");
include("config/firebaseRDB.php");

$db = new firebaseRDB($databaseURL);

include('./view/index.php');
?>