<?php
    // session_start();
    sleep(1);
    if(isset($_SESSION['usuario'])){
        unset($_SESSION['usuario']);
    }
    header('Location: index.php?pagina=ingreso');
?>