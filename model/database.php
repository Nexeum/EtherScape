<?php
    /*
        Data of connection to the database
    */
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'bitzeel');

    /*
        Connection verification
    */
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        echo "Conexion perdida con el servidor. Reportar al administrador.";
    }
    if (@mysqli_connect_errno()) {
        echo "Informar el siguiente Error".mysqli_connect_errno()." : ". mysqli_connect_error();
    }
?>