<?php
if (!isset($_SESSION['email'])) {
    include('public/index.php');
} else {
    if ($_SESSION['tipo'] == 'admin') {
        include('private/admin/index.php');
    } elseif ($_SESSION['tipo'] == 'user') {
        include('private/users/index.php');
    }
}
?>


