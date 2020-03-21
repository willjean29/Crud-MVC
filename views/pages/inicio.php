<?php
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?pagina=ingreso');
    }
?>


<table class="table table-striped">
    <thead>
        <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="table-user">

    </tbody>
    
</table>


