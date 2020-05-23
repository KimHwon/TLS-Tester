<?php
    require_once(__DIR__.'/header.php');

    unset($_SESSION['usr']);
    unset($_SESSION['uid']);
    header('Location: index.php');
?>