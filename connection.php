<?php

    $database= new mysqli("localhost","root","","docffinding");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }
?>