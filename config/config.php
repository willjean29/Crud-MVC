<?php
    /**
     * URL constante
     */
    define('PORT', 8080);
    define('BASEPATH' , '/cursoPHP/CrudMVC/');
    define('URL'      , 'http://127.0.0.1:'.PORT.BASEPATH);

    /**
     * Constantes para los paths de archivos
     */
    define('DS'          , DIRECTORY_SEPARATOR);
    define('ROOT'        , getcwd().DS);
    define('VIEWS'       , ROOT.'views'.DS);
    define('CONTROLLERS' , ROOT.'controllers'.DS);
    define('MODELS'      , ROOT.'models'.DS);
    define('CONFIG'      , ROOT.'config'.DS);


    define('ASSETS'  , URL.'assets/');
    define('CSS'     , ASSETS.'css/');
    define('JS'      , ASSETS.'js/');

?>