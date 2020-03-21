<?php

    require_once "controllers/templateController.php";
    
    require_once "controllers/formController.php";


    require_once "models/Formulario.php";

    session_start();


    $template = new TemplateController();
    $template->traerTemplate();
?>