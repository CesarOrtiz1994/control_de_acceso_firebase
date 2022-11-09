<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Cesar Emmanuel Ortiz and Laptofix">
    <title>Control de acceso</title>
    <link href="<?php echo $Base_URL ?>static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $Base_URL ?>static/css/admin.css" rel="stylesheet">
    <script src="<?php echo $Base_URL ?>static/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a1b28d1703.js" crossorigin="anonymous"></script>
    <script>
        var appData = {
            "base_url": '<?php echo $Base_URL ?>',
            "nom_users_login": '<?php echo $_SESSION['nombre'] ?>'
        } 
    </script> 
</head>

<body> 

<?php
include('nav.php');
?>