<?php
    if (file_exists(__DIR__.'/configuration-local.php')) {
        require_once(__DIR__.'/configuration-local.php');
    }
    else {
        require_once(__DIR__.'/configuration.php');
    }

    session_start();
?>