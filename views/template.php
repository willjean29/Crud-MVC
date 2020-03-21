<?php include_once 'config/config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud MVC</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center py-3">LOGO</h1>
    </div>

    <div class="container-fluid">

        <div class="container bg-light">
            <ul class="nav nav-justified py-2 nav-pills">
                <li class="nav-item">
                    <a href="index.php?pagina=registro" class="nav-link">Registro</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=ingreso" class="nav-link">Ingreso</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=inicio" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item" id='salir'>
                    <a href="index.php?pagina=salir" class="nav-link">Salir</a>
                </li>
            </ul>
        </div>

        <div class="container-fluid py-3">
        
            <div class="container px-1">
            <?php 
                if(isset($_GET['pagina'])){
                    if($_GET['pagina'] == 'registro' || $_GET['pagina'] == 'ingreso' ||
                        $_GET['pagina'] == 'inicio' || $_GET['pagina'] == 'salir' || $_GET['pagina'] == 'editar'){
                            include_once 'pages/'.$_GET['pagina'].'.php';
                    }else{
                        include_once('pages/error.php') ;
                    }
                }else{
                    include_once('pages/registro.php') ;
                }
            
            ?>
            </div>

        </div>
    </div>






    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Custom Script -->
    <script src="assets/js/main.js"></script>
  
</body>
</html>