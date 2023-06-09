<?php
    session_start();

    // cerrar la sesion y redireccionar a la pagina de inicio
    session_unset();
    session_destroy();

    header("Location: ../public/index.php");
    exit();
?>
