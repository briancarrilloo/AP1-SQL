<?php
    function SQLConnect(){
        $dbhost = "mysql-briancarrillo.alwaysdata.net";
        $dbuser = "225887_mvm";
        $dbpass = "@MVM2021";
        $db = "briancarrillo_mvm";
    
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Error en la connexión %s\n". $conn -> error);

        return $conn;
    }
    function SQLDisconnect($conn){
        $conn -> close();
    }
?>